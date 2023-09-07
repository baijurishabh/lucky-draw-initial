<?php

namespace App\Listeners;

use App\Events\PoolWinEvent;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PoolWinListener
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
     * @param  \App\Events\PoolWinEvent  $event
     * @return void
     */
    public function handle(PoolWinEvent $event)
    {
        $project = [
            'greeting' => 'Hello ' . $event->user->name . ',',
            'subject' => 'Congratulation you won a pool',
            'body' => 'Congratulation you won a pool for product' . ' ' . $event->product_pool->product->name . ' ' . 'at price:' . ' ' . '₹ ' . $event->product_pool->product->our_price . ' ' .  '. You can purchase the product on before' . ' ' . Carbon::parse($event->winner->countdown)->format('d-M-Y  g:i:s A'),
            'actionText' => 'Dashboard',
            'actionURL' => url('/user/pool/win'),
            'id' => $event->user->id
        ];
        try {
            Notification::send($event->user, new EmailNotification($project));
        } catch (\Throwable $th) {
        }
    }
}
