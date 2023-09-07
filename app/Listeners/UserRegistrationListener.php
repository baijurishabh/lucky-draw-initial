<?php

namespace App\Listeners;

use App\Events\UserRegistrationEvent;
use App\Http\Controllers\notification\NotificationController;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UserRegistrationListener
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
     * @param  \App\Events\UserRegistrationEvent  $event
     * @return void
     */
    public function handle(UserRegistrationEvent $event)
    {
        if ($event->type == 'registration') {
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Account Created',
                'body' => 'Your account registration was successfully completed. Payment and KYC verification is in progress. We will notify you once account is activated',
                'actionText' => 'Login',
                'actionURL' => url('/login'),
                'id' => $event->user->id
            ];
            try {
                $whatsApp = new NotificationController();
                $contact_details = $event->user->mobile;
                $template_params =   array(
                    array(
                        "name" => "name",
                        "value" => $event->user->name,
                    ),
                );
                $template_message_id = 253;
                $whatsApp->whatsapp($template_params, $template_message_id, $contact_details);
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        if ($event->type == 'kyc_completed') {
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Your KYC verification completed',
                'body' => ' Your KYC verification has been successfully completed and account is activated. You can now start using your dashboard. Your refferal link is :'.' '.$event->user->getReferralLink() ,
                'actionText' => 'Login',
                'actionURL' => url('/login'),
                'id' => $event->user->id
            ];
            try {
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        if ($event->type == 'kyc_pending') {
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Your KYC Pending',
                'body' => ' Your KYC verification is not completed and account is disabled.',
                'actionText' => 'Login',
                'actionURL' => url('/login'),
                'id' => $event->user->id
            ];
            try {
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        if ($event->type == 'account_disabled') {
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Account Disabled',
                'body' => ' Your account is disabled. Please contact admin',
                'actionText' => 'Login',
                'actionURL' => url('/login'),
                'id' => $event->user->id
            ];
            try {
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
            }
        }
        if ($event->type == 'account_activated') {
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Account Activated',
                'body' => ' Your account is activated. You can now start using your dashboard',
                'actionText' => 'Login',
                'actionURL' => url('/login'),
                'id' => $event->user->id
            ];
            try {
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
