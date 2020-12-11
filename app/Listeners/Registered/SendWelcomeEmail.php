<?php

namespace App\Listeners\Registered;

use App\Mail\WelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(Registered $event)
    {
        $user = $event->user;

        Mail::to($user)->queue(new WelcomeEmail($user));
    }
}
