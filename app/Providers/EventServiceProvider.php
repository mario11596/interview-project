<?php

namespace App\Providers;

use App\Events\AcceptionEvent;
use App\Events\NewApplicationEvent;
use App\Listeners\AcceptionListener;
use App\Listeners\NewApplicationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewApplicationEvent::class => [
            NewApplicationListener::class,
        ],

        AcceptionEvent::class => [
            AcceptionListener::class,
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
}
