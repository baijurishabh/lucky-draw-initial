<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class OrderListener
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
     * @param  \App\Events\OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        $project = [
            'greeting' => 'Hello '.$event->order->user->name.',',
            'subject' => 'Order'.' '.$event->uuid,
            'body' => ' Your order with Order ID:' .' ' .$event->order->order_id.' '.'is'.' '.$event->uuid,
            'actionText' => 'Dashboard',
            'actionURL' => url('/user/order/list'),
            'id' => $event->order->user->id
        ];
        // $whatsApp=new NotificationController();
        // $whatsApp->whatsapp();
        try {
            Notification::send($event->order->user, new EmailNotification($project));
        } catch (\Exception $ex) {
        }
    }
}
