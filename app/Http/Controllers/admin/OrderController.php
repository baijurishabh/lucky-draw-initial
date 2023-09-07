<?php

namespace App\Http\Controllers\admin;

use App\Events\OrderEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\notification\NotificationController;
use App\Models\Order;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['list','view','list_Completed']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update','shipping_status']]);
        $this->middleware('permission:order-delete', ['only' => ['delete']]);
    }
    public function list()
    {
        $data = Order::where('order_cancelled','NO')->whereNotIn('status', ['Delivered'])->get();
        return view('admin.orders.list')->with(['data' => $data]);
    }
    public function list_Completed()
    {
        $data =Order::whereStatus('Delivered')->get();
        return view('admin.orders.list_completed')->with(['data' => $data]);
    }
    public function shipping_status($uuid,$id)
    {
        $order = Order::whereId($id)->first();
        if($uuid == "Packed")
        {
            $order->status = "Packed";
            $order->update();
        }
        if($uuid == "Delivered")
        {
            if($order->courier_name == null){
                return redirect(route('admin.orderList'))->with('error', 'Courier Details not updated');
            }
            $order->status = "Delivered";
            $order->update();
        }
        if($uuid == "Dispatched")
        {
            if($order->courier_name == null){
                return redirect(route('admin.orderList'))->with('error', 'Courier Details not updated');
            }
            $order->status = "Dispatched";
            $order->update();
        }
        if($uuid == "Shipped")
        {
            if($order->courier_name == null){
                return redirect(route('admin.orderList'))->with('error', 'Courier Details not updated');
            }
            $order->status = "Shipped";
            $order->update();
        }
        if($uuid == "Out for delivery")
        {
            if($order->courier_name == null){
                return redirect(route('admin.orderList'))->with('error', 'Courier Details not updated');
            }
            $order->status = "Out for delivery";
            $order->update();
        }
        if($uuid === "Packed" || $uuid === "Delivered" || $uuid === "Dispatched" || $uuid === "Shipped" || $uuid === "Out for delivery"){
            event(new OrderEvent($order,$uuid));
        }
        return redirect(route('admin.orderList'));
    }

    public function view($id)
    {
        $data = Order::whereId($id)->first();
        return view('admin.orders.view')->with(['data' => $data]);
    }

    public function edit($id)
    {
        $data = Order::whereId($id)->first();
        if($data){
            return view('admin.orders.edite')->with(['data' => $data]);
        }
        abort(404);
    }



    public function update(Request $request,$id)
    {
        $rules = [
            'full_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'contact_number' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

$order = Order::whereId($id)->first();

if($order){
$order->full_name = $request->full_name;
$order->address = $request->address;
$order->country = $request->country;
$order->state = $request->state;
$order->postal_code = $request->postal_code;
$order->contact_number = $request->contact_number;
$order->courier_name = $request->courier_name;
$order->tracking_link = $request->tracking_link;
$order->courier_details = $request->courier_details;
$order->update();
return redirect(route('admin.orderList'))->with('message', 'Order Details Updated Successfully');
}
return redirect(route('admin.orderList'))->with('error', 'Order Details Update Not Possible');

    }
    public function delete($id)
    {
        $post = Order::where('id', '=', $id)->first();
        if ($post->status == "Confirmed") {
            $post->delete();
            return redirect(route('admin.orderList'))->with('error', 'Order Deleted Successfully');
        }
        return redirect(route('admin.orderList'))->with('error', 'Order has'  .' ' .$post->status.' '. 'not Possible to Cancel');
    }
}
