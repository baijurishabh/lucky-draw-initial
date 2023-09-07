<?php

namespace App\Listeners;

use App\Events\PaymentEvent;
use App\Http\Controllers\notification\NotificationController;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PaymentListener
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
     * @param  \App\Events\PaymentEvent  $event
     * @return void
     */
    public function handle(PaymentEvent $event)
    {
        if($event->payment_type=='plan_purchase'){
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Payment Success',
                'body' => 'Your payment of'.' '. '₹'. $event->pay->amount .' '. 'for account registration was successfull. KYC verification is in progress. We will notify you once account is activated',
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
        if($event->payment_type=='product_purchase'){
            $project = [
                'greeting' => 'Hello ' . $event->user->name . ',',
                'subject' => 'Order Placed Successfully',
                'body' => 'Your payment of'.' '. '₹'. $event->pay->amount .' '. 'for product'.' '.$event->product->name. ' '.'with Order ID:'.' '.$event->order->order_id.' '.  'was successfully placed. You can check the order updates through dashboard',
                'actionText' => 'Dashboard',
                'actionURL' => url('/user/order/list'),
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
                    array(
                        "name" => "order_id",
                        "value" => $event->order->order_id
                    ),
                );
                $template_message_id = 254;
                $whatsApp->whatsapp($template_params, $template_message_id, $contact_details);
                Notification::send($event->user, new EmailNotification($project));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
