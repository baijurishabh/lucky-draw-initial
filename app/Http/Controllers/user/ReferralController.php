<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function list(){
        $users=Auth()->user()->affiliate;
        return view('user.referral.list',compact('users'));
    }
}
