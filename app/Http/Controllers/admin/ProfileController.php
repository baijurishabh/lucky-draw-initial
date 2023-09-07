<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        return view('admin.admin.profile');
    }
    public function adminProfileUpdate()
    {
        return view('admin.admin.profileupdate');
    }
    public function adminProfileUpdatePost(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'image' => 'sometimes|required|file|mimes:jpg,png,jpeg',
            'password' => 'min:6',
    'confirm_password' => 'required_with:password|same:password|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $admin = Admin::whereId(Auth::user()->id)->first();
        $admin->name =  $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if ($request->file('image')) {
            if (Storage::exists("public/admin/$admin->image")) {
                Storage::delete("public/admin/$admin->image");
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/admin', $image_name);
            $admin->image = $image_name;
        }
        $admin->update();
        return redirect(route('admin.profileView'));
    }
}
