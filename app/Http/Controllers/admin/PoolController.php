<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Pool;
use App\Models\PoolProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pool-list|pool-create|pool-edit|pool-delete', ['only' => ['list','view']]);
        $this->middleware('permission:pool-create', ['only' => ['create','store']]);
        $this->middleware('permission:pool-edit', ['only' => ['edit','update','active']]);
        $this->middleware('permission:pool-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.pool.create');
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
        $post->uuid = Str::uuid();
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/pool', $image_name);
            $post->image = $image_name;
        }
        $post->save();
        return redirect(route('admin.poolList'))->with('message', 'Pool Added Successfully');
    }
    public function list()
    {
        $data = Pool::where('type','NORMAL')->get();
        return view('admin.pool.list')->with(['data' => $data]);
    }

    public function active($uuid)
    {
        $pool = Pool::whereUuid($uuid)->first();
        Pool::whereActive('YES')->update(['active' => 'NO']);
        $pool->active = 'YES';
        $pool->update();
        return redirect(route('admin.poolList'));
    }

    public function edit($uuid)
    {
        $data = Pool::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.pool.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid)
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
        $post = Pool::where('uuid', '=', $uuid)->first();
        if ($post) {
            $post->pool_name = $request->pool_name;
            $post->description = $request->description;
            $post->start_date = $request->start_date;
            $post->end_date = $request->end_date;
            $post->active = $request->active;
            $post->update();
            return redirect(route('admin.poolList'))->with('message', 'Pool Update Successfully');
        }
        abort(404);
    }
    public function view()
    {
        return view('admin.pool.view');
    }
    public function delete($uuid)
    {

        $post = Pool::where('uuid', '=', $uuid)->first();
        if ($post) {
            $post->delete();
            return redirect(route('admin.poolList'))->with('error', 'Pool Deleted Successfully');
        }
        abort(404);
    }
}
