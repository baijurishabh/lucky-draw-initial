<?php

namespace App\Listeners;

use App\Events\EnquiryEvent;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnquiryListener
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
     * @param  \App\Events\EnquiryEvent  $event
     * @return void
     */
    public function handle(EnquiryEvent $event)
    {
        $project = [
            'greeting' => 'Hi ' . $event->user->name . ',',
            'subject' => 'Enquiry and interest has been submitted',
            'body' => 'Your Enquiry for' . ' ' .  $event->product->product->name . ' ' . 'with price' . ' ' . '₹' . $event->product->product->our_price . '.' . 'has been submitted. You can view the enquiry and pool result through dashboard',
            'actionText' => 'Dashboard',
            'actionURL' => url('/user/enquiry-list'),
            'id' => $event->user->id
        ];
        try {
            Notification::send($event->user, new EmailNotification($project));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
