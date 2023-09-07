<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['list','view']]);
    }
    public function list($uuid)
    {
        $user = User::whereUuid($uuid)->first();
        $data=$user->affiliate;
        return view('admin.referral.list')->with(['data' => $data]);
    }
}
