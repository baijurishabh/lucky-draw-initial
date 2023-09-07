<?php

namespace App\Http\Controllers\auth\user;

use App\Events\UserRegistrationEvent;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use App\Notifications\EmailNotification;
use Razorpay\Api\Api;
use session;

class AuthenticationController extends Controller
{
    private $razorpayId = "rzp_test_IGLqA7jjWCMUIM";
    private $razorpayKey = "7unSEGlifkDRYqpsZIkTXmDU";
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        return view('user.auth.login');
    }
    public function auth(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $user=User::whereEmail($request->email)->first();
        if($user->plan_purchase=='NO'){
            $setting = Setting::first();
            $userDetails=UserDetails::whereUserId($user->id)->first();
            $recipetId = Str::random(20);
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $order = $api->order->create(array(
                'receipt' => $recipetId,
                'amount' => $setting->price * 100,
                'currency' => 'INR'
            ));
            $response = [
                'orderId' => $order['id'],
                'razorpayId' => $this->razorpayId,
                'amount' => $setting->price * 100,
                'rate' => $setting->price,
                'name' => $user->name,
                'currency' => 'INR',
                'email' => $user->email,
                'contactNumber' => $user->mobile,
                'description' => 'Benefitshops',
                'address' => $user->userDetails->address_line1,
                'user_id' => $user->id,
                'order_type' =>'Plan'
            ];
            return view('payform')->with(['user' => $user,'userDetails' => $userDetails, 'setting' => $setting,'response'=>$response]);
        }
        if($user->kyc=='Pending'){
            return redirect()->back()->with('status', 'KYC Pending');
        }
        if($user->disable=='YES'){
            return redirect()->back()->with('status', 'Account Disabled');
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'disable' => 'NO'],$request->remember)) {

            return redirect(route('user.dashboard'))->with('message','Login Successfull');
            // return " user success";
        }
         return redirect()->back()->with('status', 'Invalid Credentials');
      //  return "user no";
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('userLogin'));
    }
    public function register()
    {
        session()->forget('registration');
        return view('user.auth.registernew');
    }
    public function registerPost(Request $request)
    {
        if(session()->get('registration')=='true'){
            return redirect(route('userRegister'));
        }
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'age' => 'required|string',
            'password' => 'required|min:6',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'mobile' => 'required|min:12|max:12|unique:users,mobile|regex:/(91)[0-9]{9}/',
            'id_card_image' => 'required|file|mimes:png,jpg,jpeg',
            'image'=>'required|file|mimes:png,jpg,jpeg',
            'id_card_type' => 'required',
            'id_card_number' => 'required',
            'ifsc_code' => 'required',
            'account_number' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator)->with('error','Validation Error');
        }
        session()->put('registration','true');
        $setting = Setting::first();
        $user = new User();
        $user->name = $request->name;
        $user->uuid = Str::uuid();
        $user->email =$request->email;
        $user->mobile =$request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();
        $userDetails = new UserDetails();
        $userDetails->sex = $request->gender;
        $userDetails->age = $request->age;
        $userDetails->telephone =$request->telephone;
        $userDetails->address_line1 = $request->address_line1;
        $userDetails->address_line2 = $request->address_line2;
        $userDetails->city = $request->city;
        $userDetails->state = $request->state;
        $userDetails->uuid = Str::uuid();
        $userDetails->country = $request->country;
        $userDetails->id_card_type = $request->id_card_type;
        $userDetails->id_card_number = $request->id_card_number;
        $userDetails->ifsc_code = $request->ifsc_code;
        $userDetails->account_number = $request->account_number;
        if ($request->file('image')) {
        $image = $request->file('image');
        $image_name = uniqid() . '.' . $image->extension();
        $image->storeAs('public/user', $image_name);
        $userDetails->image = $image_name;
        }
        if ($request->file('id_card_image')) {
            $image = $request->file('id_card_image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/user/id_card', $image_name);
            $userDetails->id_card_image = $image_name;
            }
        $userDetails->slug = "test";
        $userDetails->user_id = $user->id;
        $userDetails->save();
        event(new UserRegistrationEvent($user,$type='registration'));
        $recipetId = Str::random(20);
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $order = $api->order->create(array(
            'receipt' => $recipetId,
            'amount' => $setting->price * 100,
            'currency' => 'INR'
        ));
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $setting->price * 100,
            'rate' => $setting->price,
            'name' => $request->name,
            'currency' => 'INR',
            'email' => $request->email,
            'contactNumber' => $request->mobile,
            'description' => 'Benefitshops',
            'address' => $request->address_line1,
            'user_id' => $user->id,
            'order_type' =>'Plan'
        ];
        return view('payform')->with(['user' => $user,'userDetails' => $userDetails, 'setting' => $setting,'response'=>$response]);
    }
}
