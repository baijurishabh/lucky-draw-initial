<?php

namespace App\Listeners;

use App\Events\LeadEvent;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class LeadListener
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
     * @param  \App\Events\LeadEvent  $event
     * @return void
     */
    public function handle(LeadEvent $event)
    {
        $project = [
            'greeting' => 'Hello Admin',
            'subject' => 'New query mail',
            'body' => 'A new query mail was submitted by'.' '.$event->enquiry->email,
            'actionText' => 'Dashboard',
            'actionURL' => url('/admin/login'),
            'id' => '1'
        ];
        try {
            Notification::route('mail','tech@torcinfotech.com')->notify(new EmailNotification($project));
        } catch (\Exception $ex) {

        }
    }
}
