<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list(){
        $data = Payment::whereUserId(Auth()->user()->id)->get();
        return view('user.payment.list')->with(['data' => $data]);
    }
}
