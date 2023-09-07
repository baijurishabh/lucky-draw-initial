<?php

namespace App\Http\Controllers\notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    // public function whatsapp($template_params,$template_message_id,$phone_number){

    // }
    public function whatsapp($template_params,$template_message_id,$candidate_details){
        $response = Http::withHeaders([
            'x-api-key' => config('app.whatsapp_key')
        ])
        ->post('https://stageapi.happilee.io/api/v1/sendTemplateMessage', [
            'candidate_details'=>[
                'phone_number'=>$candidate_details
            ],
            'template_message_id'=>$template_message_id,
            'template_params'=>$template_params
        ]);
    }
}
