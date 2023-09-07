<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\GrandWinners;
use App\Models\UserDetails;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    private $razorpayId ="rzp_test_IGLqA7jjWCMUIM";
    private $razorpayKey ="7unSEGlifkDRYqpsZIkTXmDU";

    public function checkout($uuid)
    {
        session()->forget('winner');
        session()->forget('payment');
        $data = Winner::whereUuid($uuid)->first();
        if($data->redeemed == 'NO'){
            if(Carbon::now() <= $data->countdown){
                if (session()->has('winner') == null) {
                    session()->put('data', $data);
                    session()->put('winner', 'initial');
                    return view('user.checkout.checkout')->with(['data' => $data]);
                }
                session()->forget('invoice');
                session()->put('data', $data);
                session()->put('winner', 'initial');
                return view('user.checkout.checkout')->with(['data' => $data]);
               }
              return redirect()->route('user.poolWins')->with('error','Offer Expired');
        }
        return redirect()->route('user.poolWins')->with('error','Offer Redeemed');
    }

    public function store(Request $request)
    {
        switch (session()->get('winner')) {
            case ('initial'):
                $billing = $request->all();
                $user = UserDetails::whereUserId(Auth::user()->id)->first();
                session()->put('billing', $billing);
                session()->put('user', $user);
                session()->put('winner', 'confirm');
               return view('user.checkout.checkout');
                break;
               case ('confirm'):
               $recipetId = Str::random(20);
               $api = new Api($this->razorpayId, $this->razorpayKey);

               $order = $api->order->create(array(
                   'receipt' => $recipetId,
                   'amount' => session()->get('data')->product->our_price * 100,
                   'currency' => 'INR'
               ));
               $response = [
                   'orderId' => $order['id'],
                   'razorpayId' => $this->razorpayId,
                   'amount' => session()->get('data')->product->our_price * 100,
                   'rate' => session()->get('data')->product->our_price,
                   'name' => session()->get('billing.first_name'),
                   'product_id' => session()->get('data')->product_id,
                   'category_id' => session()->get('data')->product->category_id,
                   'currency' => 'INR',
                   'email' => Auth::user()->email,
                   'contactNumber' => session()->get('billing.contact_number'),
                   'description' => 'Benefitshops',
                   'address' => session()->get('billing.address'),
                   'user_id' => Auth::user()->id,
                   'order_type' => "Product_Purchase"
               ];
              session()->put('payment', 'initiate');
              return view('user.checkout.checkout',compact('response'));
                break;
            default:
               session()->forget('winner');

                return redirect(route('user.dashboard'))->with('error','Something went wrong');
    }
}

public function grand_checkout($uuid)
{
    session()->forget('winner');
    session()->forget('payment');
    $data = GrandWinners::whereUuid($uuid)->first();
    if($data->redeemed == 'NO'){
        if(Carbon::now() <= $data->countdown){
            if (session()->has('winner') == null) {
                session()->put('data', $data);
                session()->put('winner', 'initial');
                return view('user.checkout.grandcheckout')->with(['data' => $data]);
            }
            session()->forget('invoice');
            session()->put('data', $data);
            session()->put('winner', 'initial');
            return view('user.checkout.grandcheckout')->with(['data' => $data]);
           }
          return redirect()->route('user.poolWins')->with('error','Offer Expired');
    }
    return redirect()->route('user.poolWins')->with('error','Offer Redeemed');
}

public function grand_store(Request $request)
{
    switch (session()->get('winner')) {
        case ('initial'):
            $billing = $request->all();
            $user = UserDetails::whereUserId(Auth::user()->id)->first();
            session()->put('billing', $billing);
            session()->put('user', $user);
            session()->put('winner', 'confirm');
           return view('user.checkout.grandcheckout');
            break;
           case ('confirm'):
           $recipetId = Str::random(20);
           $api = new Api($this->razorpayId, $this->razorpayKey);

           $order = $api->order->create(array(
               'receipt' => $recipetId,
               'amount' => session()->get('data')->product->our_price * 100,
               'currency' => 'INR'
           ));
           $response = [
               'orderId' => $order['id'],
               'razorpayId' => $this->razorpayId,
               'amount' => session()->get('data')->product->our_price * 100,
               'rate' => session()->get('data')->product->our_price,
               'name' => session()->get('billing.first_name'),
               'product_id' => session()->get('data')->product_id,
               'category_id' => session()->get('data')->product->category_id,
               'currency' => 'INR',
               'email' => Auth::user()->email,
               'contactNumber' => session()->get('billing.contact_number'),
               'description' => 'Benefitshops',
               'address' => session()->get('billing.address'),
               'user_id' => Auth::user()->id,
               'order_type' => "Grand_Product_Purchase",
           ];

          session()->put('payment', 'initiate');
          return view('user.checkout.grandcheckout',compact('response'));
            break;
        default:
           session()->forget('winner');

            return redirect(route('user.dashboard'))->with('error','Something went wrong');
}
}
}
