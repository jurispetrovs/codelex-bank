<?php

namespace App\Http\Controllers;

use App\Events\TransactionWasCreated;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    public function store(TransactionRequest $request)
    {
        $fromAccount = Account::firstWhere('number', $request['sender']);
        $toAccount = Account::firstWhere('number', $request['recipient']);

        $amount = ($request['amount']);

        $fromAccount->withdraw($amount);
        $toAccount->deposit($amount);

        $transaction = (new Transaction())->fill([
            'sender_id' => $fromAccount->holder_id,
            'recipient_id' => $toAccount->holder_id,
            'amount' => $amount,
            'description' => $request['description'],
        ]);

        $transaction->fromAccount()->associate($request['sender']);
        $transaction->toAccount()->associate($request['recipient']);

        $transaction->save();

        event(new TransactionWasCreated($transaction));

        return redirect(route('overview'));
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }
}
