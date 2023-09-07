<?php

namespace App\Http\Controllers\home;

use App\Events\LeadEvent;
use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\notification\NotificationController;
use App\Jobs\MarketingMail;
use App\Models\Faqs;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Pool;
use App\Models\PoolProduct;
use App\Models\Product;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $whatsApp=new NotificationController();
        // $contact_details= '919847554867';
        // $template_params=   array (
        //     array(
        //         "name" => "name",
        //         "value" => "Akash"
        //     ),
        //     array(
        //         "name" => "order_id",
        //         "value" => "#iiie"
        //     ),
        // );
        // $template_message_id=254;
        //     $whatsApp->whatsapp($template_params,$template_message_id,$contact_details);
        $pool = Pool::whereActive('YES')->first();
        if ($pool) {
            $pool_products = PoolProduct::wherePoolId($pool->id)->get();
            if ($request->filter == 'special_deal') {
                $pool_products = PoolProduct::wherePoolId($pool->id)->whereHas('product', function ($q) {
                    $q->where('special_deal', '=', 'YES');
                })->get();
            }
            if ($request->filter == 'popular') {
                $pool_products = PoolProduct::wherePoolId($pool->id)->whereHas('product', function ($q) {
                    $q->where('popular', '=', 'YES');
                })->get();
            }
            if ($request->filter == 'recommendation') {
                $pool_products = PoolProduct::wherePoolId($pool->id)->whereHas('product', function ($q) {
                    $q->where('recommendation', '=', 'YES');
                })->get();
            }
            if ($request->filter == 'best_price') {
                $pool_products = PoolProduct::wherePoolId($pool->id)->whereHas('product', function ($q) {
                    $q->where('best_price', '=', 'YES');
                })->get();
            }
            if (!$request->filter) {
                $pool_products = PoolProduct::wherePoolId($pool->id)->get();
            }
        } else {
            $pool_products = null;
        }


        // Cookie::queue(Cookie::forget('referral'));
        return view('user.home.index')->with(['products' => $pool_products]);
    }
    public function productView(Request $request, $slug,$pool_product_id)
    {
        $search = $request->query('search');
        $category_id = $request->query('category_id');
        $category_name = $request->query('category_name');
        $product = PoolProduct::find($pool_product_id);
        $products = PoolProduct::wherePoolId($product->pool_id)->get();
        if ($product) {
            if ($search && $category_id != 'all') {
                $products = PoolProduct::wherePoolId($product->pool_id)->whereHas('product', function ($q) use ($search, $category_id) {
                    $q->where('name', 'Like', '%' . $search . '%')
                        ->where('name', 'Like', '%' . $search . '%')
                        ->where('category_id', 'Like', '%' . $category_id . '%')
                        ->orWhere('our_price', 'Like', '%' . $search . '%');
                })->get();
                return view('user.home.productDetail')->with(['product' => $product, 'products' => $products]);
            }
            if ($search) {
                $products = PoolProduct::wherePoolId($product->pool_id)->whereHas('product', function ($q) use ($search, $category_id) {
                    $q->where('name', 'Like', '%' . $search . '%')
                        ->where('name', 'Like', '%' . $search . '%')
                        ->orWhere('our_price', 'Like', '%' . $search . '%');
                })->get();
                return view('user.home.productDetail')->with(['product' => $product, 'products' => $products]);
            }
            if ($category_id) {
                $products = PoolProduct::wherePoolId($product->pool_id)->whereHas('product', function ($q) use ($search, $category_id) {
                    $q->where('category_id', 'Like', '%' . $category_id . '%');
                })->get();
                return view('user.home.productDetail')->with(['product' => $product, 'products' => $products]);
            }
            return view('user.home.productDetail')->with(['product' => $product, 'products' => $products]);
        }
        abort(404);
    }
    public function enquiryForm(Request $request)
    {
        if($request->token == "aboutus"){

            $rules = [
                'email' => 'email'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }

            $enquiry = new Lead();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->message = $request->message;
            $enquiry->save();
            event(new LeadEvent($enquiry));
            return redirect('/')->with('message','Query submitted successfully. We will contact you shortly');
        }
        $rules = [
            'name' => 'email',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $enquiry = new Lead();
        $enquiry->email = $request->email;
        $enquiry->save();
        event(new LeadEvent($enquiry));
        return redirect('/')->with('message','Query submitted successfully. We will contact you shortly');

    }

    public function FAQ()
    {

        return view('user.FAQs.FAQ');
    }
    public function aboutUs()
    {
        return view('user.aboutus.aboutUs');
    }
}
