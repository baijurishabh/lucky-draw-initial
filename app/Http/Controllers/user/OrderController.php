<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function order(Request $request,$uuid)
    {
            $name = $request->name;
            $product_id = $request->product_id;
            $total = $request->total;
            $quantity = $request->quantity;
            $session = $request->session_id;
            for($i=0;$i<count($name);$i++)
            {
                $datasave = [
                    'pool_id' =>$pool_id[$i],
                    'product_id' =>$product_id[$i],
                    'total' =>$total[$i],
                    'quantity' =>$quantity[$i],
                    'session_id' =>$session[$i],
                    'user_email' => Auth::user()->email,
                    'user_id' => Auth::user()->id,
                ];
                Order::insert($datasave);
    }
}
public function list(){
    $orders=Order::whereUserId(Auth()->user()->id)->get();
    if($orders){
        return view('user.order.list')->with(['orders'=>$orders]);
    }
    abort(404);
}
}
