<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:payment-list', ['only' => ['list','list_product']]);
    }
    public function list()
    {
        $payment_plan = Payment::whereType('Plan')->get();
        // dd($payment_plan);
        return view('admin.payment.plan_list')->with(['data' => $payment_plan]);
    }

    public function list_product()
    {
        $payment_product_purchase = Payment::whereType('Product_Purchase')->get();
        return view('admin.payment.product_list')->with(['data' =>  $payment_product_purchase]);
    }
}
