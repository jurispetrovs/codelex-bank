<?php

namespace App\Listeners\TransactionWasCreated;

use App\Mail\TransactionsEmails\SenderEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToSender implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {
        $transaction = $event->transaction;

        $sender = User::firstWhere('id', $transaction->sender_id);

        Mail::to($sender)->queue(new SenderEmail($transaction, $sender));
    }
}
