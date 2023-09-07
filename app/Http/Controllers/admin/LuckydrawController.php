<?php

namespace App\Http\Controllers\admin;

use App\Events\PoolWinEvent;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Pool;
use App\Models\PoolProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class LuckydrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pool-conduct', ['only' => ['list','view','enyuiryList','winner_list','canidates_list','winner']]);
    }
    public function list()
    {
        $data = Pool::all();
        return view('admin.luckydraw.list')->with(['data' => $data]);
    }
    public function enyuiryList($uuid)
    {
        $pool = Pool::whereUuid($uuid)->first();
        $data = PoolProduct::wherePoolId($pool->id)->get();
        session()->put('luckydraw_execute', true);
        return view('admin.luckydraw.spinlist')->with(['data' => $pool->poolProduct, 'pool_uuid' => $pool->uuid, 'uuid' => $uuid]);
    }
    public function winner_list($uuid)
    {
        $winners_list = PoolProduct::whereUuid($uuid)->first()->winner()->get();
        return view('admin.enquiries.list')->with(['data' => $winners_list, 'uuid' => $uuid]);
    }
    public function canidates_list($uuid)
    {
        $enquiry_list = PoolProduct::whereUuid($uuid)->first()->enquiry()->whereWinner('NO')->get();
        return view('admin.enquiries.list')->with(['data' => $enquiry_list]);
    }
    public function winner($uuid)
    {
        $product_pool = PoolProduct::find($uuid);
        if ($product_pool) {
            if (!session()->get('luckydraw_execute') == true) {
                return redirect(route('admin.luckyDrawSpinList', $product_pool->pool->uuid));
            }
            if ($product_pool->product->quantity <= 0) {
                return redirect()->back()->with('error', 'Product quantity is zero.');
            }
            $enquiry_list = $product_pool->enquiry()->whereWinner('NO')->inRandomOrder()->first();
            if ($enquiry_list) {
                $winner = new Winner();
                $winner->pool_product_id = $product_pool->id;
                $winner->product_id = $enquiry_list->product_id;
                $winner->pool_id = $enquiry_list->pool_id;
                $winner->user_id = $enquiry_list->user_id;
                $winner->enquiry_id = $enquiry_list->id;
                $winner->redeemed = "NO";
                $winner->countdown = Carbon::now()->addDays(1);
                $winner->slug = "test";
                $winner->uuid = Str::uuid();
                $winner->save();
                $enquiry_list->winner = 'YES';
                $enquiry_list->update();
                $user = User::whereId($enquiry_list->user_id)->first();
                event(new PoolWinEvent($user,$product_pool,$winner));
                session()->forget('luckydraw_execute');
                return view('admin.luckydraw.winner')->with(['winner' => $winner]);
            }
            return redirect()->back()->with('error', 'No Members Enquired');
        }
        abort(404);
    }
    public function testwinner()
    {
        $uuid = "test";
        $winner = Winner::first();
        return view('admin.luckydraw.winner')->with(['winner' => $winner, 'uuid' => $uuid]);
    }
}
