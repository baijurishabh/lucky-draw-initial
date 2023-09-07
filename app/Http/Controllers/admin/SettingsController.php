<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Redirect;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:site-settings-list|site-settings-create|site-settings-edit|site-settings-delete', ['only' => ['list','view']]);
        $this->middleware('permission:site-settings-create', ['only' => ['create','store']]);
        $this->middleware('permission:site-settings-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:site-settings-delete', ['only' => ['delete']]);
    }
    public function create()
    {
        return view('admin.settings.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'company_name' => 'required',
            'site_name' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'email_alternative' => 'required',
            'url' => 'required',
            'mobile_number' => 'required',
            'alternativemobile_number' => 'required',
            'whatsapp_number' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'logo_black' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'logo_white' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'favicon' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'video' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = new Setting();
        $post->company_name =   $request->company_name;
        $post->uuid = Str::uuid();
        $post->site_name =      $request->site_name;
        $post->address_line1 =  $request->address_line1;
        $post->address_line2 =  $request->address_line2;
        $post->city =           $request->city;
        $post->state =          $request->state;
        $post->country =        $request->country;
        $post->pincode =        $request->pincode;
        $post->mobile =         $request->mobile_number;
        $post->email =          $request->email;
        $post->email_alternative = $request->email_alternative;
        $post->url =            $request->url;
        $post->mobile_number =  $request->mobile_number;
        $post->alternativemobile_number = $request->alternativemobile_number;
        $post->whatapp_number = $request->whatapp_number;
        $post->telephone =      $request->telephone;
        $post->facebook =  $request->facebook;
        $post->instagram = $request->instagram;
        $post->twitter =   $request->twitter;
        if ($request->file('logo_black')) {
            $image = $request->file('logo_black');
            $image_logo_black = uniqid() . '.' . $image->extension();
            $image->storeAs('public/settings', $image_logo_black);
            $post->logo_black = $image_logo_black;
        }
        if ($request->file('logo_white')) {
            $image = $request->file('logo_white');
            $image_logo_white = uniqid() . '.' . $image->extension();
            $image->storeAs('public/settings', $image_logo_white);
            $post['logo_white'] = $image_logo_white;
        }
        if ($request->file('favicon')) {
            $image = $request->file('favicon');
            $image_favicon = uniqid() . '.' . $image->extension();
            $image->storeAs('public/settings', $image_favicon);
            $post['favicon'] = $image_favicon;
        }
        if ($request->file('video')) {
            $image = $request->file('video');
            $image_favicon = uniqid() . '.' . $image->extension();
            $image->storeAs('public/settings', $image_favicon);
            $post['video'] = $image_favicon;
        }

        $post->save();
        return redirect(route('admin.settingsList'));
    }
    public function list()
    {
        $data = Setting::all();
        return view('admin.settings.list')->with(['data' => $data]);
    }
    public function view()
    {
        return view('admin.settings.view');
    }
    public function edit($uuid)
    {
        $data = Setting::where('uuid', '=', $uuid)->first();
        if ($data) {
            return view('admin.settings.create')->with(['data' => $data]);
        }
        abort(404);
    }
    public function update(Request $request, $uuid)
    {

        $rules = [
            'company_name' => 'required',
            'site_name' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'email' => 'required',
            'email_alternative' => 'required',
            'url' => 'required',
            'mobile_number' => 'required',
            'alternativemobile_number' => 'required',
            'whatapp_number' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'timeout' => 'required',
            'youtube' => 'required',
            'logo_black' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'logo_white' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'favicon' => 'sometimes|required|file|mimes:png,jpg,jpeg',
            'video' => 'sometimes|required|file|mimes:mp4,mov'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $post = Setting::where('uuid', '=', $uuid)->first();
        if ($post) {
            $post->company_name =   $request->company_name;
            $post->uuid = Str::uuid();
            $post->site_name =      $request->site_name;
            $post->address_line1 =  $request->address_line1;
            $post->address_line2 =  $request->address_line2;
            $post->city =           $request->city;
            $post->state =          $request->state;
            $post->youtube=         $request->youtube;
            $post->country =        $request->country;
            $post->pincode =        $request->pincode;
            $post->mobile =         $request->mobile_number;
            $post->email =          $request->email;
            $post->email_alternative = $request->email_alternative;
            $post->url =            $request->url;
            $post->mobile_number =  $request->mobile_number;
            $post->alternativemobile_number = $request->alternativemobile_number;
            $post->whatapp_number =  $request->whatapp_number;
            $post->telephone = $request->telephone;
            $post->facebook =  $request->facebook;
            $post->instagram = $request->instagram;
            $post->twitter =   $request->twitter;
            $post->timeout =   $request->timeout;
            $post->slug =      "lucky-draw-admin_settings";
            if ($request->logo_black) {
                $image_path         = storage_path("\storage/settings\\") . $post->logo_black;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $source_image = $request->file('logo_black');
                $image = time() . '.' . $request->logo_black->extension();
                $source_image->storeAs('public/settings', $image);
                $post['logo_black'] = $image;
            }
            if ($request->logo_white) {
                $image_path         = storage_path("\storage/settings\\") . $post->logo_white;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $source_image = $request->file('logo_white');
                $image = time() . '.' . $request->logo_white->extension();
                $source_image->storeAs('public/settings', $image);
                $post['logo_white'] = $image;
            }
            if ($request->favicon) {
                $image_path         = storage_path("\storage/settings\\") . $post->favicon;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $source_image = $request->file('favicon');
                $image = time() . '.' . $request->favicon->extension();
                $request->favicon->storeAs('public/settings', $image);
                $post['favicon'] = $image;
            }
            if ($request->video) {
                $image_path         = storage_path("\storage/settings\\") . $post->video;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $source_image = $request->file('video');
                $image = time() . '.' . $request->favicon->extension();
                $request->favicon->storeAs('public/settings', $image);
                $post['video'] = $image;
            }
            // dd($post);
            $post->update();
            return redirect(route('admin.settingsList'))->with('message','Settings Updated successfully');
        }
        abort(404);
    }
    public function delete($uuid)
    {
        $post = Setting::where('uuid', '=', $uuid)->first();
        if ($post->logo_black) {
            $logo_black     = storage_path("\storage/settings\\") . $post->logo_black;
            if (File::exists($logo_black)) {
                File::delete($logo_black);
            }
        }
        if ($post->logo_white) {
            $logo_white     = storage_path("\storage/settings\\") . $post->logo_white;
            if (File::exists($logo_white)) {
                File::delete($logo_white);
            }
        }
        if ($post->favicon) {
            $favicon     = storage_path("\storage/settings\\") . $post->favicon;
            if (File::exists($favicon)) {
                File::delete($favicon);
            }
        }
        $post->delete();
        return redirect(route('admin.settingsList'));
    }
}
