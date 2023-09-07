<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $products = Product::all();
        $enquiries = Enquiry::all();
        $payments = Payment::all();
        $orders = Order::all();
        return view('admin.dashboard.dashboard')->with(['users' => $users, 'products' => $products, 'enquiries' => $enquiries, 'payments' => $payments,'orders'=>$orders]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }
    public function store()
    {
        return redirect(route('admin.blogList'));
    }
    public function list()
    {
        return view('admin.blog.list');
    }
    public function edit($uuid)
    {
        return view('admin.blog.create');
    }
    public function update(Request $request, $uuid)
    {
        return view('admin.blog.create');
    }

    public function view()
    {
        return view('admin.blog.view');
    }
    public function delete($uuid)
    {
        return redirect(route('admin.blogList'));
    }
}
