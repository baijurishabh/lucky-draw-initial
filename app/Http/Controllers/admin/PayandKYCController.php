<?php

namespace App\Http\Controllers\admin;

use App\Events\UserRegistrationEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class PayandKYCController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['list','view']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update','kyc_status','acc_disable','acc_activate']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    public function list(){
        $user = User::all();
        return view('admin.kyc.list')->with(['user' => $user]);
    }
    public function kyc_status($uuid){
        $activate = User::whereUuid($uuid)->first();

        if($activate->kyc == "Pending"){
            $activate->kyc = "Completed";
            $activate->update();
            event(new UserRegistrationEvent($activate,$type='kyc_completed'));
            return redirect(route('admin.userList'));
        }
        if($activate->kyc == "Completed"){
        $activate->kyc = "Pending";
        $activate->update();
        event(new UserRegistrationEvent($activate,$type='kyc_pending'));
        return redirect(route('admin.userList'));
    }
    abort(404);
}

    public function acc_disable($uuid){
        $activate = User::whereUuid($uuid)->first();
        $activate->disable = "YES";
        $activate->update();
        event(new UserRegistrationEvent($activate,$type='account_disabled'));
        return redirect(route('admin.userList'));
    }


    public function acc_activate($uuid){
        $activate = User::whereUuid($uuid)->first();
        $activate->disable = "NO";
        $activate->update();
        event(new UserRegistrationEvent($activate,$type='account_activated'));
        return redirect(route('admin.userList'));
    }
    public function edit($uuid)
    {
        $data = User::where('uuid', '=', $uuid)->first();
        // dd($data);
        return view('admin.kyc.view')->with(['data' => $data]);
    }
    public function update(Request $request, $uuid)
    {
        $user = User::whereUuid($uuid)->first();
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'sex' => 'required',
            'age' => 'required|string',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'mobile' => 'required|string|min:10|max:15|unique:users,mobile,'.$user->id,
            'image' => 'sometimes|file|required|mimes:png,jpg,jpeg',
            'id_card_image' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'id_card_type' => 'required',
            'id_card_number' => 'required',
            'ifsc_code' => 'required',
            'account_number' => 'required',
            'kyc' => 'in:Pending,Completed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $userDetails = UserDetails::whereUserId($user->id)->first();
        if($user){
            $user->name = $request->name;
            $user->uuid = Str::uuid();
            $user->email =$request->email;
            $user->mobile =$request->mobile;
            if($user->kyc=='Pending' && $request->kyc=='Completed'){
                event(new UserRegistrationEvent($user,$type='kyc_completed'));
            }
            $user->kyc =$request->kyc;
            $user->update();
        }
        if($userDetails){
            $userDetails->sex = $request->sex;
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
                $userDetails->image = $image_name;
                }
            $userDetails->update();
        }
return redirect(route('admin.userList'));
    }
    public function delete($uuid){

        $data_user = User::where('uuid', '=', $uuid)->first();

        if($data_user){

            $data_userDetails = UserDetails::whereUserId($data_user->id)->first();
            if($data_userDetails){
                $data_userDetails->delete();
            }
            $data_user->delete();
        }
        abort(404);
    }
}
