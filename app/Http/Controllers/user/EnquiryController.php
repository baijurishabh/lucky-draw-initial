<?php

namespace App\Http\Controllers\user;

use App\Events\EnquiryEvent;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\PoolProduct;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class EnquiryController extends Controller
{
    public function store($uuid)
    {
        $post = PoolProduct::where('uuid', '=', $uuid)->first();
        $exist_enquiry = Enquiry::whereUserId(Auth::user()->id)->wherePoolProductsId($post->id)->first();
        if($exist_enquiry)
        {
            return redirect('/')->with('error','Already Enquired');
        }

        $data = new Enquiry();
        $data->user_id = Auth::user()->id;
        $data->pool_id = $post->pool_id;
        $data->product_id = $post->product_id;
        $data->pool_products_id = $post->id;
        $data->slug = "test";
        $data->description = "note";
        $data->uuid = Str::uuid();
        $data->save();
        $user = User::whereId(Auth::user()->id)->first();
        event(new EnquiryEvent($user,$post));
        return redirect('/')->with('message','Enquiry Submitted Successfully');

    }
}
