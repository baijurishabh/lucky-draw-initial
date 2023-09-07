<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\GrandWinners;
use App\Models\Pool;
use App\Models\PoolProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Validator;

class GrandLuckyDrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pool-list|pool-create|pool-edit|pool-delete', ['only' => ['grand_pool_list', 'view']]);
        $this->middleware('permission:pool-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pool-edit', ['only' => ['edit', 'update', 'active']]);
        $this->middleware('permission:pool-delete', ['only' => ['delete']]);
        $this->middleware('permission:winner-list', ['only' => ['grand_list_redeemed','grand_list_pending','grand_list_expired','winner_list']]);
        $this->middleware('permission:winner-delete', ['only' => ['delete']]);
        $this->middleware('permission:pool-conduct', ['only' => ['enyuiryList','grand_lucky_draw']]);
    }
    public function create()
    {
        return view('admin.grand_pool.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'pool_name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'active' => 'required|in:YES,NO',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Pool();
        $post->pool_name = $request->pool_name;
        $post->description = $request->description;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->active = $request->active;
        $post->type = 'GRAND';
        $post->uuid = Str::uuid();
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/pool', $image_name);
            $post->image = $image_name;
        }
        $post->save();
        return redirect(route('admin.grandpoolList'))->with('message', 'Grand Pool Added Successfully');
    }
    public function grand_pool_list()
    {
        $grand_pool = Pool::where('type', 'GRAND')->get();
        return view('admin.grand_pool.list')->with(['grand_pool' => $grand_pool]);
    }
    public function enyuiryList($uuid)
    {
        $pool = Pool::whereUuid($uuid)->first();
        $data = PoolProduct::wherePoolId($pool->id)->get();
        session()->put('luckydraw_execute', true);
        return view('admin.grand_pool.spinlist')->with(['data' => $pool->poolProduct, 'pool_uuid' => $pool->uuid, 'uuid' => $uuid]);
    }
    public function grand_lucky_draw($uuid)
    {
        $product_pool = PoolProduct::find($uuid);
        // dd($product_pool);
        if ($product_pool) {
            if (!session()->get('luckydraw_execute') == true) {
                return redirect(route('admin.luckyDrawSpinList', $product_pool->pool->uuid));
            }
            $user = User::wherePlanPurchase('YES')->whereKyc('Completed')->inRandomOrder()->first();
        // dd($user);
            if ($user) {
                $winner = new GrandWinners();
                $winner->pool_product_id = $product_pool->id;
                $winner->product_id = $product_pool->product_id;
                $winner->pool_id = $product_pool->pool_id;
                $winner->user_id = $user->id;
                $winner->redeemed = "NO";
                $winner->countdown = Carbon::now()->addDays(1);
                $winner->slug = "test";
                $winner->uuid = Str::uuid();
                $winner->save();
                $project = [
                    'greeting' => 'Hello ' . $user->name . ',',
                    'subject' => 'Congratulation you won a pool',
                    'body' => 'Congratulation you won the Grand pool for product' . ' ' . $product_pool->product->name . ' ' . 'at price:' . ' ' . '₹ ' . $product_pool->product->our_price . ' ' .  '. You can purchase the product on before' . ' ' . Carbon::parse($winner->countdown)->format('d-M-Y  g:i:s A'),
                    'actionText' => 'Dashboard',
                    'actionURL' => url('/login'),
                    'id' => $user->id
                ];
                try {
                    Notification::send($user, new EmailNotification($project));
                } catch (\Throwable $th) {
                }
                // dd($user->referred_by);
                if ($user->referred_by == null) {
                    session()->forget('luckydraw_execute');
                    return view('admin.grandwinners.winner')->with(['winner' => $winner]);
                }

                $referred_user = User::where('affiliate_id',$user->referred_by)->first();
                if(User::where('referred_by',$user->referred_by)->count() >= 2){
                    $winner->referred_user_valid = "YES";
                    $winner->referred_user_id = $referred_user->id;
                    $winner->update();
                    $project = [
                        'greeting' => 'Hello ' . $referred_user->name . ',',
                        'subject' => 'Congratulation you won a pool',
                        'body' => 'Congratulation you won the Grand pool for product' . ' ' . $product_pool->product->name . ' ' . 'at price:' . ' ' . '₹ ' . $product_pool->product->our_price . ' ' .  '. You can purchase the product on before' . ' ' . Carbon::parse($winner->countdown)->format('d-M-Y  g:i:s A'),
                        'actionText' => 'Dashboard',
                        'actionURL' => url('/login'),
                        'id' => $user->id
                    ];
                    try {
                        Notification::send($user, new EmailNotification($project));
                    } catch (\Throwable $th) {
                    }
                    session()->forget('luckydraw_execute');
                    return view('admin.grandwinners.winner')->with(['winner' => $winner , 'referred_winner' => $referred_user]);
                }
                // return "test";
                session()->forget('luckydraw_execute');
                return view('admin.grandwinners.winner')->with(['winner' => $winner]);
            }

            return redirect()->back()->with('error', 'No Members Enquired');
        }
        abort(404);
    }
    public function grand_list_redeemed(){
        $data = GrandWinners::whereRedeemed('YES')->get();
        return view('admin.winners.listredeemed')->with(['data' => $data]);
    }

    public function grand_list_pending(){
        $data = GrandWinners::whereRedeemed('NO')->get();
        return view('admin.winners.listpending')->with(['data' => $data]);
    }

    public function grand_list_expired()
    {
        $data = GrandWinners::where('countdown', '<=', Carbon::now())->get();
        return view('admin.winners.listexpired')->with(['data' => $data]);
    }
    public function winner_list($uuid)
    {
        $winners_list = PoolProduct::whereUuid($uuid)->first()->grandWinner()->get();
        return view('admin.grandwinners.enquirylist')->with(['data' => $winners_list, 'uuid' => $uuid]);
    }
    public function delete($uuid){
    $data = GrandWinners::whereUuid($uuid)->first();
    if($data){
        $data->delete();
        return redirect()->back()->with('error','Grand Winner Deleted successfully');

    }
    abort(404);
}
}
