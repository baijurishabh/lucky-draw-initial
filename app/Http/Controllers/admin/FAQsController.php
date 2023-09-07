<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class FAQsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['list']]);
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['reply','reply_update']]);
        $this->middleware('permission:faq-delete', ['only' => ['delete']]);
    }
    public function list()
    {
        $data = Faqs::all();
        return view('admin.faqs.list')->with(['data' => $data]);
        }

        public function create(){
            return view('admin.faqs.reply');
            }


        public function store(Request $request){

                    $rules = [
                        'reply' => 'required',
                        'question' => 'required'
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return redirect()->back()->withInput($request->all())->withErrors($validator);
                    }
                    $data = new Faqs();
                    $data->reply = $request->reply;
                    $data->question = $request->question;
                    $data->save();

                    return redirect(route('admin.faqlist'));
                }
    public function reply($id){
        // dd($id);
    $data = Faqs::whereId($id)->first();
    return view('admin.faqs.reply')->with(['data' => $data]);
    }
    public function reply_update(Request $request,$id){

        $data = Faqs::whereId($id)->first();
        if($data)
        {
            $rules = [
                'reply' => 'required',
                'question' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }
            $data->reply = $request->reply;
            $data->update();
            }
            return redirect(route('admin.faqlist'));
        }
    public function delete($id)
    {
        $data = Faqs::whereId($id)->first();
        if($data)
        {
            $data->delete();
            return redirect(route('admin.faqlist'));
        }
        abort(404);
    }
}

