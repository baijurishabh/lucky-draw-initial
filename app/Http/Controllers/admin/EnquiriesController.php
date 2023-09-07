<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Pool;
use App\Models\PoolProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class EnquiriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:enquiry-list|enquiry-create|enquiry-edit|enquiry-delete', ['only' => ['list','view']]);
        $this->middleware('permission:enquiry-create', ['only' => ['create','store']]);
        $this->middleware('permission:enquiry-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:enquiry-delete', ['only' => ['delete']]);
    }
    public function create(){
        return view('user.home.home');
    }
    public function store($uuid)
    {
        $post = PoolProduct::where('uuid', '=', $uuid)->first();
        $exist_enquiry = Enquiry::whereUserId(Auth::user()->id)->wherePoolProductsId($post->id)->first();
        if($exist_enquiry)
        {
            return redirect('/')->with('error','Already Enquired');
        }
        $data = new Enquiry();
        $data->user_id = Auth::user()->id;
        $data->pool_id = $post->pool_id;
        $data->product_id = $post->product_id;
        $data->pool_products_id = $post->id;
        $data->slug = "test";
        $data->description = "note";
        $data->uuid = Str::uuid();
        $data->save();

        $user = User::whereId(Auth::user()->id)->first();
        $project = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'Enquiry for' . ' '.  $post->product->name . ' ' . 'Has Been Registered',
            'thanks' => 'Thank you for your participation in Benefitshops',
            'actionText' => 'Dashboard',
            'actionURL' => url('/login'),
            'id' => $user->id
        ];
        FacadesNotification::send($user, new EmailNotification($project));

        return redirect('/')->with('message','Enquiry Submitted Successfully');

    }
    public function list()
    {
        $data = Enquiry::all();
        return view('admin.enquiries.list')->with(['data' => $data]);
    }
    public function edit($uuid)
    {   $data = Enquiry::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.enquiries.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid )
    {
        $post = Enquiry::where('uuid', '=', $uuid)->first();
        $post->name =   $request->name;
        $post->description =      $request->description;
        $post->active =  $request->active;
        $post->discount_type =  $request->discount_type;
        $post->product_type =    $request->product_type;
        if($request->image){
        $image_path         = storage_path("\storage/category\\") .$request->image;
        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
            $source_image = $request->file('image');
            $image = time().'.'.$request->image->extension();
            $request->image->storeAs('public/category', $image);
            $post['image'] = $image;
    }
        $post->update();
        return redirect(route('admin.enquiriesList'));
    }

    public function view(){
        return view('admin.blog.view');
    }
    public function delete($uuid){
        $post = Enquiry::where('uuid', '=', $uuid)->first();
        $post->delete();
        return redirect(route('admin.enquiriesList'));
    }

}
