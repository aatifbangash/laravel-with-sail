<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * Events and Listeners are registered as a key => value pair in the $listen
     * Registered::class is an Event
     * SendEmailVerificationNotification::class is a Listener
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /**
         * LoginHistory:- is Event
         * StoreLoginHistory, StoreLoginHistory2, StoreLoginHistory3 are Listeners for the Event
         */
        LoginHistory::class => [
            StoreLoginHistory::class,
            StoreLoginHistory2::class,
            // StoreLoginHistory3::class,
        ]
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
}
