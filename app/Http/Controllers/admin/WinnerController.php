<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:winner-list', ['only' => ['list_redeemed','list_pending','list_expired']]);
        $this->middleware('permission:winner-delete', ['only' => ['delete']]);
    }
    public function list_redeemed(){
        $data = Winner::whereRedeemed('YES')->get();
        return view('admin.winners.listredeemed')->with(['data' => $data]);
    }

    public function list_pending(){
        $data = Winner::whereRedeemed('NO')->get();
        return view('admin.winners.listpending')->with(['data' => $data]);
    }

    public function list_expired()
    {
        $data = Winner::where('countdown', '<=', Carbon::now())->get();
        return view('admin.winners.listexpired')->with(['data' => $data]);
    }
    public function delete($uuid)
    {
        $post = Winner::where('uuid', '=', $uuid)->first();
        $post->delete();
        return redirect(route('admin.winnerList'));
    }
}
