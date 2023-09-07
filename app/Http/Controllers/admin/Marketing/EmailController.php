<?php

namespace App\Http\Controllers\admin\Marketing;

use App\Http\Controllers\Controller;
use App\Jobs\MarketingMail;
use App\Models\Email;
use App\Models\User;
use App\Notifications\MarketingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:marketing-module', ['only' => ['list','create','store','edit','update','delete']]);
    }
    public function list()
    {
        $data = Email::all();
        if($data)
        {
            return view('admin.marketingEmail.list',compact('data'));
        }
        abort(404);

    }

    public function create()
    {
        return view('admin.marketingEmail.create');
    }

    public function store(Request $request)

   {
    $rules = [
        'title' => 'required',
        'heading' => 'required',
        'body' => 'required',
        'footer' => 'required',
        'status' => 'required',
        'type' => 'required',
        'image' => 'sometimes|required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',

    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->back()->withInput($request->all())->withErrors($validator);
    }
    $email = new Email();
    $email->title = $request->title;
    $email->heading = $request->heading;
    $email->body = $request->body;
    $email->status = $request->status;
    $email->footer = $request->footer;
    $email->type = $request->type;
    $email->footer = $request->footer;
    $email->uuid = Str::uuid();
    if ($request->file('asset')) {
        $image = $request->file('asset');
        $image_name = uniqid() . '.' . $image->extension();
        $image->storeAs('public/marketingTemplate', $image_name);
        $email->asset = $image_name;
    }
    $email->save();
    return redirect(route('admin.marketingTemplatelist'));
   }


   public function edit($uuid)
   {
    $data = Email::whereUuid($uuid)->first();
    // dd($data);
    return view('admin.marketingEmail.create',compact('data'));
   }


   public function update(Request $request,$uuid)
   {
    $rules = [
        'title' => 'required',
        'heading' => 'required',
        'body' => 'required',
        'footer' => 'required',
        'status' => 'required',
        'type' => 'required',
        'image' => 'sometimes|required|file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx',

    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->back()->withInput($request->all())->withErrors($validator);
    }
    $email = Email::whereUuid($uuid)->first();
    $email->title = $request->title;
    $email->heading = $request->heading;
    $email->body = $request->body;
    $email->status = $request->status;
    $email->footer = $request->footer;
    $email->type = $request->type;
    $email->footer = $request->footer;
    if($request->asset){
        if ($email->asset) {
            if (Storage::exists("public/marketingTemplate/$email->asset")) {
                Storage::delete("public/marketingTemplate/$email->asset");
            }
    }
        $source_image = $request->file('asset');
        $image = time().'.'.$request->asset->extension();
        $request->image->storeAs('public/marketingTemplate', $image);
        $post['asset'] = $image;

    }
    $email->update();
    return redirect(route('admin.marketingTemplatelist'));
}
public function sendCampaign($uuid){
    $email=Email::whereUuid($uuid)->first();
    if($email){
        $user = User::find(1);
        try {
            Notification::send($user, new MarketingNotification($email));
        } catch (\Exception $th) {
     //    dd($th);
        }
      //  MarketingMail::dispatch($user,$email);
        return redirect(route('admin.marketingTemplatelist'));
    }
   abort(404);
}
public function delete($uuid)
{
    $post = Email::where('uuid', '=', $uuid)->first();
    if($post){
        if (Storage::exists("public/marketingTemplate$post->image")) {
            Storage::delete("public/marketingTemplate$post->image");
        }
        $post->delete();
        return redirect(route('admin.marketingTemplatelist'))->with('error','Template deleted successfully');
    }
    abort(404);
}
}
