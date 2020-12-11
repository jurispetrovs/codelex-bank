<?php

namespace App\Http\Requests;

use App\Models\Account;
use App\Rules\EnoughFunds;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        $this->request->set('amount', (int)(($this->request->get('amount')) * 100));

        $balance = $this->getBalance();

        return [
            'sender' => ['required', 'exists:accounts,number'],
            'recipient' => ['required', 'exists:accounts,number'],
            'amount' => ['required', 'numeric', 'min:1', new EnoughFunds($balance)],
            'description' => ['required']
        ];
    }

    public function getBalance()
    {
        if ($this->request->get('sender')) {
            return Account::firstWhere('number', $this->request->get('sender'))->balance;
        }

        return 0;
    }
}
