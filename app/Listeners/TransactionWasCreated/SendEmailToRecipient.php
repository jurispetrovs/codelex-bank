<?php

namespace App\Listeners\TransactionWasCreated;

use App\Events\TransactionWasCreated;
use App\Mail\TransactionsEmails\RecipientEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToRecipient implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TransactionWasCreated $event)
    {
        $transaction = $event->transaction;

        $recipient = User::firstWhere('id', $transaction->recipient_id);

        Mail::to($recipient)->queue(new RecipientEmail($transaction, $recipient));
    }
}
