<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\PoolProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['list','view']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.product.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'market_price' => 'required',
            'our_price' => 'required',
            'online_price' => 'required',
            // 'specification'=>'required',
            // 'discount' => 'required|in:YES,NO',
            'active' => 'required|in:YES,NO',
            'special_deal' => 'required|in:YES,NO',
            'popular' => 'required|in:YES,NO',
            'recommendation' => 'required|in:YES,NO',
            'best_price' => 'required|in:YES,NO',
            'image' => 'required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image2' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image3' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image4' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Product();
        $post->name =   $request->name;
        $post->uuid = Str::uuid();
        $post->category_id = $request->category_id;
        $post->short_description =      $request->short_description;
        $post->description =      $request->description;
        $post->market_price =      $request->market_price;
        $post->our_price =  $request->our_price;
        $post->specification=$request->specification;
        $post->online_price =  $request->online_price;
        $post->active =  $request->active;
        $post->special_deal =  $request->special_deal;
        $post->popular =  $request->popular;
        $post->recommendation =  $request->recommendation;
        $post->best_price =  $request->best_price;
        $post->discount =  $request->discount;
        $post->discount_type =  $request->discount_type;
        $post->discount_value =    $request->discount_value;
        $post->quantity =  $request->quantity;
        $post->youtube_link =$request->youtube_link;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/product', $image_name);
            $post->image = $image_name;
        }
        if ($request->file('image2')) {
            $image = $request->file('image2');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/product', $image_name);
            $post->image2 = $image_name;
        }
        if ($request->file('image3')) {
            $image = $request->file('image3');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/product', $image_name);
            $post->image3 = $image_name;
        }
        if ($request->file('image4')) {
            $image = $request->file('image4');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/product', $image_name);
            $post->image4 = $image_name;
        }
        $post->slug = $request->name;
        $post->save();
        return redirect(route('admin.productList'))->with('message', 'Product Added Successfully');
    }
    public function list(){
        $data = Product::all();
        return view('admin.product.list')->with(['data' => $data]);
    }
    public function edit($uuid)
    {   $data = Product::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.product.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid )
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'market_price' => 'required',
            'our_price' => 'required',
            'online_price' => 'required',
            // 'discount' => 'required|in:YES,NO',
            'active' => 'required|in:YES,NO',
            'special_deal' => 'required|in:YES,NO',
            'popular' => 'required|in:YES,NO',
            'recommendation' => 'required|in:YES,NO',
            'best_price' => 'required|in:YES,NO',
            'image' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image2' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image3' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
            'image4' => 'sometimes|required|file|mimes:png,jpg,jpeg||dimensions:min_width=460,min_height=260,max_width=460,max_height=260',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = Product::where('uuid', '=', $uuid)->first();
        if($post){
            $post->name =   $request->name;
            $post->short_description =      $request->short_description;
            $post->description =      $request->description;
            $post->market_price =      $request->market_price;
            $post->our_price =  $request->our_price;
            $post->online_price =  $request->online_price;
            $post->active =  $request->active;
            $post->specification=$request->specification;
            $post->discount =  $request->discount;
            $post->discount_type =  $request->discount_type;
            $post->discount_value =    $request->discount_value;
            $post->quantity =  $request->quantity;
            $post->special_deal =  $request->special_deal;
            $post->popular =  $request->popular;
            $post->recommendation =  $request->recommendation;
            $post->best_price =  $request->best_price;
            $post->youtube_link = $request->youtube_link;
            if($request->image){
                if ($post->image) {
                    if (Storage::exists("public/product/$post->image")) {
                        Storage::delete("public/product/$post->image");
                    }
            }
                $source_image = $request->file('image');
                $image = time().'.'.$request->image->extension();
                $request->image->storeAs('public/product', $image);
                $post['image'] = $image;
        }
        if($request->image2){
            if ($post->image2) {
                if (Storage::exists("public/product/$post->image2")) {
                    Storage::delete("public/product/$post->image2");
                }
        }
            $source_image = $request->file('image2');
            $image = time().'.'.$request->image2->extension();
            $request->image2->storeAs('public/product', $image);
            $post['image2'] = $image;
    }
    if($request->image3){
        if ($post->image3) {
            if (Storage::exists("public/product/$post->image3")) {
                Storage::delete("public/product/$post->image3");
            }
    }
        $source_image = $request->file('image3');
        $image = time().'.'.$request->image3->extension();
        $request->image3->storeAs('public/product', $image);
        $post['image3'] = $image;
}
if($request->image4){
    if ($post->image2) {
        if (Storage::exists("public/product/$post->image4")) {
            Storage::delete("public/product/$post->image4");
        }
}
    $source_image = $request->file('image4');
    $image = time().'.'.$request->image4->extension();
    $request->image4->storeAs('public/product', $image);
    $post['image4'] = $image;
}
            $post->update();
            return redirect(route('admin.productList'))->with('message', 'Product Updated Successfully');
        }
        abort(404);

    }
    public function view(){
        return view('admin.blog.view');
    }
    public function delete($uuid){
        $post = Product::where('uuid', '=', $uuid)->first();
        if(PoolProduct::whereProduct_id($post->id)->exists() || Enquiry::whereProduct_id($post->id)->exists())
        return redirect(route('admin.poolDetailsList'))->with('error', 'Enquiry Present On this Product');
        if ($post) {
            if ($post->image) {
                if (Storage::exists("public/product/$post->image")) {
                    Storage::delete("public/product/$post->image");
                }
            }
            $post->delete();
            return redirect(route('admin.productList'))->with('error', 'Product Deleted Successfully');
        }
        abort(404);
    }
}
