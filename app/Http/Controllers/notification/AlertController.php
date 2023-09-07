<?php

namespace App\Http\Controllers\notification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class AlertController extends Controller
{
    public function send()
    {
    	$user = User::first();
        $project = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'Registartion Procedure is Completed. KYC Verification in Progress',
            'thanks' => 'Thank you this is from Benefitshops',
            'actionText' => 'View Project',
            'actionURL' => url('/login'),
            'id' => 57
        ];
        Notification::send($user, new EmailNotification($project));

        dd('Notification sent!');
    }
}
