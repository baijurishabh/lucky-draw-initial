<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = User::findOrFail(Auth::user()->id);
        return view('user.dashboard.dashboard',compact('user'));
    }
    public function enquiry_list()
    {
        $data = Enquiry::whereUserId(Auth::user()->id)->get();
        if($data){
            return view('user.enquiry.list')->with(['data' => $data]);
        }
abort(404);
    }
    public function enquiry_delete($uuid)
    {
        $post = Enquiry::where('uuid', '=', $uuid)->first();
        if($post){
            $post->delete();
            return redirect(route('user.enquiryList'));
        }
        abort(404);
    }
}
