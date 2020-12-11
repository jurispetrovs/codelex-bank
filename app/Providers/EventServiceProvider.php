<?php

namespace App\Providers;

use App\Events\TransactionWasCreated;
use App\Listeners\Registered\SendWelcomeEmail;
use App\Listeners\TransactionWasCreated\SendEmailToRecipient;
use App\Listeners\TransactionWasCreated\SendEmailToSender;
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
            SendWelcomeEmail::class,
        ],
        TransactionWasCreated::class => [
            SendEmailToSender::class,
            SendEmailToRecipient::class,
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
