<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\GrandWinners;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WinandEnquiriesController extends Controller
{
    public function wins()
    {
        $data = Winner::whereUserId(Auth::user()->id)->get();
        if($data){
            return view('user.wins.list')->with(['data' => $data]);
        }
        abort(404);
    }
    public function grand_wins()
    {
        $data = GrandWinners::whereUserId(Auth::user()->id)->get();
        if($data){
            return view('user.wins.grandwinlist')->with(['data' => $data]);
        }
        abort(404);
    }
    public function rewards_wins()
    {
        $data = GrandWinners::whereReferredUserId(Auth::user()->id)->where('referred_user_redeemed','NO')->get();
        if($data){
            return view('user.wins.rewards')->with(['data' => $data]);
        }
    }
}
