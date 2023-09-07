<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::whereNotIn('id',[Auth()->user()->id])->orderBy('id','DESC')->get();
        return view('admin.admin.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|unique:admins,mobile',
            'password'=> 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['uuid'] = Str::uuid();
        $admin = Admin::create($input);
        $admin->assignRole($request->input('roles'));
        return redirect(route('admin.admins.index'))->with('message','User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::pluck('name','name')->all();
        if(Auth()->user()->id != $admin->id && $admin->roles->first()->name='Super Admin'){
            $adminRole = $admin->roles->pluck('name','name')->all();
            return view('admin.admin.create',compact('admin','roles','adminRole'));
        }
        abort(403);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'mobile' => 'required|unique:admins,mobile,'.$id,
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $admin = Admin::find($id);
        if(Auth()->user()->id != $admin->id && $admin->roles->first()->name='Super Admin'){
        $admin->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $admin->assignRole($request->input('roles'));
        return redirect(route('admin.admins.index'))->with('message','User Updated Successfully');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        if(Auth()->user()->id != $admin->id && $admin->roles->first()->name='Super Admin'){
        $admin->forceDelete();
        return redirect(route('admin.admins.index'))->with('error','User Deleted Successfully');
        }
        abort(403);
    }
}
