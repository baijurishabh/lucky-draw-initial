<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();
            if($finduser){
                if(!$finduser->google_id){
                    $finduser->google_id=$user->id;
                    $finduser->update();
                }
                if($finduser->plan_purchase=='NO'){
                    return redirect(route('userLogin'))->with('status', 'Use normal login and complete the payment');
                }
                if($finduser->kyc=='Pending'){
                    return redirect(route('userLogin'))->with('status', 'KYC Pending');
                }
                if($finduser->disable=='YES'){
                    return redirect(route('userLogin'))->with('status', 'Account Disabled');
                }
                Auth::login($finduser);

                return redirect(route('user.dashboard'))->with('message','Login Successfull');

            }else{
                return redirect(route('userLogin'))->with('status','Account not found');
            }

        } catch (Exception $e) {
            return redirect(route('userLogin'))->with('status','Something went wrong');
        }
    }
}
