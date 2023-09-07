<?php

namespace App\Providers;

use App\Events\EnquiryEvent;
use App\Events\GrandPoolWinEvent;
use App\Events\LeadEvent;
use App\Events\OrderEvent;
use App\Events\PaymentEvent;
use App\Events\PoolWinEvent;
use App\Events\ResetPasswordEvent;
use App\Events\UserRegistrationEvent;
use App\Listeners\EnquiryListener;
use App\Listeners\GrandPoolWinListener;
use App\Listeners\LeadListener;
use App\Listeners\OrderListener;
use App\Listeners\PaymentListener;
use App\Listeners\PoolWinListener;
use App\Listeners\ResetPasswordListener;
use App\Listeners\UserRegistrationListener;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\ResetPasswordNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ResetPasswordEvent::class => [
            ResetPasswordListener::class,
        ],
        OrderEvent::class => [
            OrderListener::class,
        ],
        EnquiryEvent::class => [
            EnquiryListener::class,
        ],
        UserRegistrationEvent::class => [
            UserRegistrationListener::class,
        ],
        PaymentEvent::class => [
            PaymentListener::class,
        ],
        PoolWinEvent::class => [
            PoolWinListener::class,
        ],
        GrandPoolWinEvent::class => [
            GrandPoolWinListener::class,
        ],
        LeadEvent::class => [
            LeadListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
