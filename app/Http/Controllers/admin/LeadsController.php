<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:leads-list|leads-create|leads-edit|leads-delete', ['only' => ['list','view']]);
        $this->middleware('permission:leads-create', ['only' => ['create','store']]);
        $this->middleware('permission:leads-edit', ['only' => ['edit','update',]]);
        $this->middleware('permission:leads-delete', ['only' => ['delete']]);
    }
    public function list()
{
    $data = Lead::all();
    return view('admin.leads.list')->with(['data' => $data]);
}
}
