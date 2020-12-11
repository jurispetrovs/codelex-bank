<?php

namespace App\Http\Controllers;

use App\Events\TransactionWasCreated;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Swap\Builder;


class TransactionsController extends Controller
{
    private $swap;

    public function __construct()
    {
        $this->swap = (new Builder())
            ->add('exchange_rates_api')
            ->build();
    }

    public function store(TransactionRequest $request)
    {
        $fromAccount = Account::firstWhere('number', $request['sender']);
        $toAccount = Account::firstWhere('number', $request['recipient']);

        $amount = ($request['amount']);

        $rate = $this->swap->latest($fromAccount->currency . '/' . $toAccount->currency);
        $exchangedValue = (int)($amount * $rate->getValue());

        $fromAccount->withdraw($amount);
        $toAccount->deposit($exchangedValue);

        $transaction = (new Transaction())->fill([
            'sender_id' => $fromAccount->holder_id,
            'recipient_id' => $toAccount->holder_id,
            'amount' => $amount,
            'exchanged_amount' => $exchangedValue,
            'description' => $request['description'],
        ]);

        $transaction->fromAccount()->associate($request['sender']);
        $transaction->toAccount()->associate($request['recipient']);

        $transaction->save();

        event(new TransactionWasCreated($transaction));

        return redirect(route('overview'));
    }
}
