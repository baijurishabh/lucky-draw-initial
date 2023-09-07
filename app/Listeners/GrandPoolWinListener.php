<?php

namespace App\Listeners;

use App\Events\GrandPoolWinEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GrandPoolWinListener
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
     * @param  \App\Events\GrandPoolWinEvent  $event
     * @return void
     */
    public function handle(GrandPoolWinEvent $event)
    {
        //
    }
}
