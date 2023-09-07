<?php

namespace App\Http\Controllers\payment;

use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Models\GrandWinners;
use App\Models\Order;
use App\Models\Pay;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Models\Winner;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    protected $razorpayId,$razorpayKey;
    public function __construct()
    {
        $this->razorpayId = config('app.razorpay_id');
        $this->razorpayKey = config('app.razorpay_key');
    }

    public function payment()
    {
        return view('payform');
    }
    public function paymentInitiate(Request $request)
    {
        // dd($request->all());
        $recipetId = Str::random(20);
        $api = new Api($this->razorpayId, $this->razorpayKey);

        $order = $api->order->create(array(
            'receipt' => $recipetId,
            'amount' => $request->amount * 100,
            'currency' => 'INR'
        ));
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->amount * 100,
            'rate' => $request->amount,
            'name' => $request->name,
            'currency' => 'INR',
            'email' => $request->email,
            'contactNumber' => $request->mobile,
            'description' => 'Benefitshops',
            'address' => $request->address,
            'user_id' => $request->user_id,
            'order_type' => $request->order_type
        ];
        //   dd($response);
        return view('payment.payment', compact('response'));
    }
    public function paymentResponse(Request $request)
    {

        // dd(session()->get('data'));
        $signatureStatus = $this->Signatureverify(
            $request->rzp_signature,
            $request->rzp_paymentId,
            $request->rzp_orderId
        );
        $codegen = random_int(1000, 9999); //creating invoice number
        $code = "#IN$codegen";

        if ($signatureStatus == true) {
            $pay = new Payment();
            $pay->user_id = $request->user_id;
            $pay->rzp_payment_id = $request->rzp_paymentId;
            $pay->rzp_order_id = $request->rzp_orderId;
            $pay->rzp_signature = $request->rzp_signature;
            $pay->uuid = Str::uuid();
            $pay->mode = "Razorpay";
            $pay->payment_type = "Online";
            $pay->amount = $request->amount;
            $pay->type = $request->order_type;
            $pay->transaction_id = $code;

            if ($request->order_type == 'Product_Purchase') {

                $order = new Order();
                $order->uuid=Str::uuid();
                $order->payment_id = $pay->id;
                $order->invoice_id = "123";
                $order->transaction_id = $pay->transaction_id;
                $order->product_id = $request->product_id;
                $order->product_price = $request->amount;
                $str = Str::random(4);
                $order->order_id = "#ODR$str";
                $order->user_id = Auth()->user()->id;
                $order->quantity = "1";
                $order->payment_status = "Paid";
                $order->mode = "Razorpay";
                $order->full_name = session()->get('billing.full_name');
                $order->city = session()->get('billing.city');
                $order->address = session()->get('billing.address');
                $order->state = session()->get('billing.state');
                $order->country = session()->get('billing.country');
                $order->postal_code = session()->get('billing.postal_code');
                $order->contact_number = session()->get('billing.contact_number');
                $order->category_id = $request->category_id;
                $order->save();
                $product = Product::whereId($request->product_id)->first();
                $product->decrement('quantity');
                $product->update();
                $winner = Winner::find(session()->get('data')->id);
                $winner->redeemed = 'YES';
                $winner->save();
                $pay->order_id = $order->id;
                $pay->save();
                $order->payment_id=$pay->id;
                $order->save();
                $user = User::whereId($request->user_id)->first();
                event(new PaymentEvent($user,$pay,$payment_type='product_purchase',$product,$order));
                session()->forget('winner');
                session()->forget('payment');
                return redirect()->route('user.dashboard')->with('message', 'Order was successfully placed');
            }
            if ($request->order_type == 'Grand_Product_Purchase') {
              //  dd("llop");
                $order = new Order();
                $order->uuid=Str::uuid();
                $order->payment_id = $pay->id;
                $order->invoice_id = "123";
                $order->transaction_id = $pay->transaction_id;
                $order->product_id = $request->product_id;
                $order->product_price = $request->amount;
                $str = Str::random(4);
                $order->order_id = "#ODR$str";
                $order->user_id = Auth()->user()->id;
                $order->quantity = "1";
                $order->payment_status = "Paid";
                $order->mode = "Razorpay";
                $order->full_name = session()->get('billing.full_name');
                $order->city = session()->get('billing.city');
                $order->address = session()->get('billing.address');
                $order->state = session()->get('billing.state');
                $order->country = session()->get('billing.country');
                $order->postal_code = session()->get('billing.postal_code');
                $order->contact_number = session()->get('billing.contact_number');
                $order->category_id = $request->category_id;
                $order->save();
                $winner = GrandWinners::find(session()->get('data')->id);
                if($winner->user_id == Auth::user()->id){
                    $winner->redeemed = 'YES';
                    $winner->update();
                }
                if($winner->referred_user_id == Auth::user()->id){
                $winner->referred_user_redeemed = 'YES';
                $winner->update();
                }
                  $pay->order_id = $order->id;
                $pay->save();
                $order->payment_id=$pay->id;
                $order->save();
                $user = User::whereId($request->user_id)->first();
                // event(new PaymentEvent($user,$pay,$payment_type='product_purchase',$product,$order));
                session()->forget('winner');
                session()->forget('payment');
                return redirect()->route('user.dashboard')->with('message', 'Order was successfully placed');
            }
            $pay->save();
            Cookie::queue(Cookie::forget('name'));
            session()->forget('registration');
            $user = User::whereId($request->user_id)->first();
            $user->plan_purchase = 'YES';
            $user->save();
            event(new PaymentEvent($user,$pay,$payment_type='plan_purchase',$product=null,$order=null));
            Cookie::queue(Cookie::forget('referral'));
            return redirect('/')->with('message', 'Registration was successfull and payment was captured. We will inform you once account is activated');
        } else {
            Cookie::queue(Cookie::forget('referral'));
            return redirect('/')->with('error', 'Payment error. Contact support team if payment was deducted');
        }
    }
    public function Signatureverify($_signature, $_paymentId, $_orderId)
    {
        try {
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
        }
    }
}
