<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:admin")->except('logout');
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function auth(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        if (Auth::guard("admin")->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('admin.dashboard'))->with('message','Admin Logined Successfully');
            // return "success";
        }
         return redirect()->back()->with('status', 'Invalid credentials');
        //return "no";
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('adminLogin'))->with('message','Admin Logout Successful');;
    }
}
