<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Pool;
use Illuminate\Support\Str;
use App\Models\PoolProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PoolDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pool-product-list|pool-product-create|pool-product-edit|pool-product-delete', ['only' => ['list','view','pool_products_list']]);
        $this->middleware('permission:pool-product-create', ['only' => ['create','store']]);
        $this->middleware('permission:pool-product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pool-product-delete', ['only' => ['delete']]);
    }
    public function create($uuid)
    {
        $pool =PoolProduct::wherePoolId($uuid)->get();
        $data = [];
        foreach ($pool as $pools) {
            $data[] = $pools->product_id;
        }
       $data_sorted = Product::whereNotIn('id',$data)->get();
        return view('admin.pool_details.create')->with(['data' => $data_sorted,'pool_id' => $uuid]);;
    }
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->favorite_fruits); $i++) {
            $post = [
                'product_id' => $request->favorite_fruits[$i],
                'description' => $request->description,
                'pool_id' => $request->pool_id,
                'slug' => "test",
                'uuid' => Str::uuid(),
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ];
            PoolProduct::insert($post);
        }
        return redirect(route('admin.poolDetailsList'))->with('message','Pool product created successfully');
    }
    public function list(){
        $data = PoolProduct::all();
        return view('admin.pool_details.list')->with(['data' => $data]);
    }
    public function pool_products_list($id){
        $data = PoolProduct::wherePoolId($id)->withTrashed()->get();
        if($data){
            return view('admin.pool_details.list')->with(['data' => $data]);
        }
        abort(404);
    }
    public function edit($uuid)
    {
        $pool = Pool::where('uuid', '=', $uuid)->first();
        $data = PoolProduct::where('pool_id',$pool->id)->get();
        if ($data) {
            return view('admin.pool_details.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid )
    {
        $post = PoolProduct::where('uuid', '=', $uuid)->first();
        if($post){
            $post->product_id = $request->product_id;
            $post->description =$request->description;
            $post->pool_uuid = $request->pool_uuid;
            $post->update();
            return redirect(route('admin.poolDetailsList'))->with('message','Pool product updated successfully');
       }
       abort(404);
    }
    public function view(){
        return view('admin.pool.view');
    }
    public function delete($uuid){
        $post = PoolProduct::where('uuid', '=', $uuid)->first();
        if($post){
            $post->delete();
            return redirect(route('admin.poolDetailsList'))->with('message','Pool product deleted successfully');
        }
        abort(404);
    }
}
