<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PoolProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        $data = PoolProduct::all();
        return view('user.home.home')->with(['data' => $data]);
    }
}
