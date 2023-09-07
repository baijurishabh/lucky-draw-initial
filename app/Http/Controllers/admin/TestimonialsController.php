<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['list','view']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['delete']]);
    }
    public function create()
    {
            return view('admin.testimony.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'client_name' => 'required',
            'text' => 'required',
            'date' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Testimony();
        $post->client_name =   $request->client_name;
        $post->uuid = Str::uuid();
        $post->text =      $request->text;
        $post->date =  $request->date;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/testimony', $image_name);
            $post->image = $image_name;
        }
        $post->slug = $request->client_name;
        $post->save();
        return redirect(route('admin.testimonyList'))->with('message','Testimony Created successfully');
    }
    public function list(){
        $data = Testimony::all();
        return view('admin.testimony.list')->with(['data' => $data]);
    }
    public function edit($uuid)
    {   $data = Testimony::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.testimony.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid )
    {
        $rules = [
            'client_name' => 'required',
            'text' => 'required',
            'date' => 'required',
            'image' => 'sometimes|required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = Testimony::where('uuid', '=', $uuid)->first();
        if($post){
            $post->client_name =   $request->client_name;
            $post->text =      $request->text;
            $post->date =  $request->date;
            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = uniqid() . '.' . $image->extension();
                $image->storeAs('public/testimony', $image_name);
                $post->image = $image_name;
            }
            $post->update();
            return redirect(route('admin.testimonyList'))->with('message','Testiony Updated successfully');
        }
        abort(404);

    }
    public function view(){
        return view('admin.blog.view');
    }
    public function delete($uuid){
        $post = Testimony::where('uuid', '=', $uuid)->first();
        if($post){
            if (Storage::exists("public/testimony/$post->image")) {
                Storage::delete("public/testimony/$post->image");
            }
            $post->delete();
            return redirect(route('admin.testimonyList'))->with('error','Testimony deleted successfully');
        }
        abort(404);
    }
}
