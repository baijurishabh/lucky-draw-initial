<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['list','view']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'active' => 'required|in:YES,NO',
            'image' => 'required|file|mimes:png,jpg,jpeg',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Category();
        $post->name =   $request->name;
        $post->uuid = Str::uuid();
        $post->description = $request->description;
        $post->active =  $request->active;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/category', $image_name);
            $post->image = $image_name;
        }
        $post->save();
        return redirect(route('admin.categoryList'))->with('message', 'Category Added Successfully');
    }
    public function list()
    {
        $data = Category::all();
        return view('admin.category.list')->with(['data' => $data]);
    }
    public function edit($uuid)
    {
        $data = Category::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.category.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'active' => 'in:YES,NO',
            'image' => 'sometimes|required|file|mimes:png,jpg,jpeg',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = Category::where('uuid', '=', $uuid)->first();
        if ($post) {
            $post->name =   $request->name;
            $post->description =      $request->description;
            $post->active =  $request->active;
            if ($request->image) {
                if (Storage::exists("public/category/$post->image")) {
                    Storage::delete("public/category/$post->image");
                }
                $image = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/category', $image);
                $post['image'] = $image;
            }
            $post->update();
            return redirect(route('admin.categoryList'))->with('message', 'Category Updated Successfully');
        }
        abort(404);
    }
    public function view()
    {
        return view('admin.blog.view');
    }
    public function delete($uuid)
    {
        $post = Category::where('uuid', '=', $uuid)->first();
        if ($post) {
            if ($post->image) {
                if (Storage::exists("public/category/$post->image")) {
                    Storage::delete("public/category/$post->image");
                }
            }
            $post->delete();
            return redirect(route('admin.categoryList'))->with('error', 'Category Deleted Successfully');
        }
        abort(404);
    }
}
