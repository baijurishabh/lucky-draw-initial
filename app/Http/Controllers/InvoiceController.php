<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use PDF;
class InvoiceController extends Controller
{
    public function orderInvoiceGenerate($order_uuid){
        $order=Order::whereUuid($order_uuid)->first();
        if($order){
            $pdf = PDF::loadView('orderInvoice',array('order'=>$order));
            return $pdf->download('Order Invoice'.' '.$order->order_id.'.pdf');
        }
        abort(404);
    }
    public function planInvoiceGenerate($payment_uuid){
        $payment=Payment::whereUuid($payment_uuid)->first();
        if($payment->type=='Plan'){
            $pdf = PDF::loadView('planInvoice',array('payment'=>$payment));
            return $pdf->download('Plan Invoice'.' '.$payment->transaction_id.'.pdf');
        }
        abort(404);
    }
}
