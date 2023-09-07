<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:policy-module|policy-edit', ['only' => ['registration_policy_list']]);
        $this->middleware('permission:policy-edit', ['only' => ['registration_policy_edit','registration_policy_update']]);
    }
    public function registration_policy()
    {
        return view('user.policy.RegistrationRefundPolicy');
    }
    public function product_policy()
    {
        return view('user.policy.ProductRefundPolicy');
    }

    public function registration_policy_list()
    {
        $data = Pages::all();
        return view('admin.policy.list')->with(['data' => $data]);
    }
    public function registration_policy_form()
    {
        return view('admin.policy.registrationpolicy');
    }

    public function registration_policy_create(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'heading' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $policy = new Pages();
        $policy->heading = $request->heading;
        $policy->type = $request->title;
        $policy->description = $request->description;
        $policy->save();
        return redirect(route('admin.registration_policylist'));
    }
    public function registration_policy_edit($id){

        $data = Pages::whereId($id)->first();
        return view('admin.policy.registrationpolicy')->with(['data' => $data]);
    }
    public function registration_policy_update(Request $request,$id){
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'heading' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $policy = Pages::whereId($id)->first();
        if($policy){
            $policy->heading = $request->heading;
            $policy->type = $request->title;
            $policy->description = $request->description;
            $policy->update();
            return redirect(route('admin.registration_policylist'));
        }
abort(404);

    }


    public function delete($id)
    {
        $policy = Pages::whereId($id)->first();
        if($policy){
            $policy->delete();
            redirect(route('admin.registration_policylist'));
        }
    }
}
