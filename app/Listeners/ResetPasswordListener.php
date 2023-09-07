<?php

namespace App\Listeners;

use App\Events\ResetPasswordEvent;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResetPasswordListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ResetPasswordEvent  $event
     * @return void
     */
    public function handle(ResetPasswordEvent $event)
    {
        $data = [
            'greeting' => 'Hello ' . $event->user->name . ',',
            'subject' => 'Password Reset Successfully',
            'body' => 'Your password was reset successfully on'.' '.Carbon::now()->format('d-M-Y  g:i:s A').'.'.' '.'If it was not done by you please contact technical support ',
            'actionText' => 'Login',
            'actionURL' => url('/login'),
        ];
        try {
            Notification::send($event->user, new EmailNotification($data));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
