<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile.profile');
    }
    public function update()
    {
        $data = UserDetails::whereUserId(Auth::user()->id)->first();
        if($data){
            return view('user.profile.update')->with(['data' => $data]);
        }
        return view('user.profile.update');
    }
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'gender'=>'required',
            'image' => 'sometimes|required|file|mimes:jpg,png,jpeg',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $data = UserDetails::whereUserId(Auth::user()->id)->first();
        $user=User::find(Auth()->user()->id);
        if($data)
        {
            $post = UserDetails::whereUserId(Auth::user()->id)->first();
            $user->name=$request->name;
            $user->update();
            $post->sex =  $request->gender;
            if ($request->file('image')) {
                if (Storage::exists("public/user/$post->image")) {
                    Storage::delete("public/user/$post->image");
                }
                $image = $request->file('image');
                $image_name = uniqid() . '.' . $image->extension();
                $image->storeAs('public/user', $image_name);
                $post->image = $image_name;
            }
            $post->update();
            return redirect()->route('user.profile')->with('message','Profile updated');
        }
        abort(404);
    }

}
