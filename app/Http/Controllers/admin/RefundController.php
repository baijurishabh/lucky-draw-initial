<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:refund-list', ['only' => ['refund','payed_refund']]);
        $this->middleware('permission:refund-edit', ['only' => ['edit','payment_refunded_status']]);
        $this->middleware('permission:refund-delete', ['only' => ['delete']]);
    }
    public function refund()
    {
        $refund = Payment::where('refund', ['YES'])->get();
        $list[] = 0;
        foreach ($refund as $refunds) {
                    $list[] = $refunds->order_id;
                }
        $available = Order::whereNotIn('id', $list)->get();
        return view('admin.refund.refundList')->with(['data' => $available]);
    }

    public function payed_refund()
    {
        $data = Payment::where('refund', ['YES'])->get();
        return view('admin.refund.payedRefundList')->with(['data' => $data]);
    }
    public function payment_refunded_status($uuid)
    {
$payment = Payment::whereUuid($uuid)->first();
if($payment){
    $payment->refund = "YES";
    $payment->update();
    return redirect(route('admin.refund.completedList'))->with('message', 'Amount Refunded Successfully');
}
return redirect(route('admin.refund.pendingList'))->with('message', 'Refund Status Incompete');
    }
}
