<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['list','view']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'blog_type' => 'required',
            'status' => 'required',
            'color' => 'required',
            'published_by' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',
            'published_date' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Blog();
        $post->title =   $request->title;
        $post->uuid = Str::uuid();
        $post->description =      $request->description;
        $post->blog_type =  $request->blog_type;
        $post->status =  $request->status;
        $post->color = $request->color;
        $post->published_by =  $request->published_by;
        $post->published_date =    $request->published_date;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/blog', $image_name);
            $post->image = $image_name;
        }
        $post->slug = $request->title; // updation
        $post->save();
        return redirect(route('admin.blogList'))->with('message','Blog Created successfully');
    }
    public function list()
    {
        $data = Blog::all();
        return view('admin.blog.list')->with(['data' => $data]);
    }
    public function edit($uuid)
    {
        $data = Blog::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.blog.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'blog_type' => 'required',
            'status' => 'required',
            'color' => 'required',
            'published_by' => 'required',
            'image' => 'sometimes|required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',
            'published_date' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $post = Blog::where('uuid', '=', $uuid)->first();
        if($post){
            $post->title =   $request->title;
        $post->description =      $request->description;
        $post->blog_type =  $request->blog_type;
        $post->status =  $request->status;
        $post->color = $request->color;
        $post->published_by =  $request->published_by;
        $post->published_date =    $request->published_date;
        if ($request->image) {
            $image_path         = storage_path("\storage/blog\\") . $request->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $source_image = $request->file('image');
            $image = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/blog', $image);
            $post['image'] = $image;
        }
        $post->update();
        return redirect(route('admin.blogList'))->with('message','Blog Updated successfully');
        }
       abort(404);
    }
    public function view()
    {
        return view('admin.blog.view');
    }
    public function delete($uuid)
    {
        $post = Blog::where('uuid', '=', $uuid)->first();
        if($post){
            if (Storage::exists("public/blog/$post->image")) {
                Storage::delete("public/blog/$post->image");
            }
            $post->delete();
            return redirect(route('admin.blogList'))->with('error','Blog deleted successfully');
        }
        abort(404);
    }
}
