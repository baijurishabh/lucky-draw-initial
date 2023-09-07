<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use App\Jobs\MarketingMail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class MarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:marketing-module', ['only' => ['marketingMail', 'usersReferralList', 'usersNotPurchasedPlan', 'topSellingProducts', 'usersJoinedList', 'joinedDateList']]);
    }
    public function marketingMail()
    {
        $user = User::all();
        MarketingMail::dispatch($user);
        return 'mailsend';
    }
    public function usersReferralList(Request $request)
    {
        $users = User::all();
        $data=[];
        if ($request->referral_count != null) {
            foreach ($users as $user) {
                if ($user->affiliate->count() == $request->referral_count) {
                    $data[] = $user;
                }
            }
            return view('admin.marketing.referralList')->with(['data' => $data]);
        }
        return view('admin.marketing.referralList')->with(['data' => $users]);
    }
    public function usersNotPurchasedPlan()
    {
        $data = User::wherePlanPurchase('NO')->get();
        return view('admin.marketing.userNotPurchasedPlan', compact('data'));
    }
    public function topSellingProducts()
    {
        $data = Product::withCount(['order' => function ($q) {
            $q->orderBy('id', 'desc');
        }])->get();
        return view('admin.marketing.topSellingProducts', compact('data'));
    }
    public function usersJoinedList(Request $request): Response
    {
        $query = User::query();
        $data_filter = $request->date_filter;

        switch ($data_filter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'yesterday':
                $query->wheredate('created_at', Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'last_month':
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
            case 'last_year':
                $query->whereYear('created_at', Carbon::now()->subYear()->year);
                break;
        }
        $data = $query->get();

        return response()->view('admin.marketing.joined', compact('data', 'data_filter'));
    }
    //     public function usersReferralList(Request $request): Response
    //     {
    //         $query = User::query();
    //         $data_filter = $request->referral_filter;

    //         switch($data_filter){
    //             case 'no_referral':
    //                 $query->where('referred_by',null);
    //                 break;
    //             case 'one_referral':
    //                 $one_referral = $query->pluck('affiliate_id');
    //                 // dd($one_referral);
    //                 $query->whereIn('referred_by',$one_referral)->wherIn();
    //                 break;
    //             case 'many_referral':
    //                 $query->where('referred_by','<=', 2);
    //                 break;
    //         }

    //         $data = $query->get();
    // dd($data);
    //         return response()->view('admin.marketing.joined',compact('data','data_filter'));
    //     }
    public function joinedDateList(Request $request): Response
    {
        // dd($request->start_date);
        $query = User::query();
        $this->validate($request, [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        //old code//

        // $start = Carbon::parse($request->end_date);
        // $end = Carbon::parse($request->start_date);
        // dd($start);
        // $query->select('id', 'name', 'email', 'created_at')
        //     ->whereBetween('created_at', [$start, $end]);
        // //    dd($users);
        // $data_filter = [0];
        // $data = $query->get();
        // // dd($data);

        //new code//
        $data_filter = [0];
        $data=User::whereBetween('created_at',[$request->start_date,$request->end_date])->get();
        return response()->view('admin.marketing.joined', compact('data', 'data_filter'));
    }
    public function joinedDateListView($uuid)
    {
        $data = User::whereUuid($uuid)->first();
        return view('admin.marketing.view',compact('data'));
    }
    public function marketingProductView($uuid)
    {
        $data = Product::whereUuid($uuid)->first();
        return view('admin.marketing.productview',compact('data'));
    }
    public function referralListView($uuid)
    {
        $user = User::whereUuid($uuid)->first();
        $data = User::whereReferredBy($user->affiliate_id)->get();
        return view('admin.marketing.referralListView',compact('data'));
    }

}
