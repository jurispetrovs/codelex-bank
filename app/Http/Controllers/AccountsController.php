<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Account::class, 'account');
    }

    public function index()
    {
        $transactions = Transaction::where('sender_id', Auth::user()->id)
            ->orWhere('recipient_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('overview', [
            'transactions' => $transactions
        ]);
    }

    public function store(AccountRequest $request)
    {
        $account = (new Account)->fill([
            'number' => 'LV18HABA0551' . mt_rand(100000000, 999999999),
            'currency' => $request['currency'],
        ]);

        $account->user()->associate(auth()->id());
        $account->save();

        return redirect(route('overview'));
    }

    public function show(Account $account)
    {
        return view('accounts.show', [
            'account' => $account
        ]);
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect(route('overview'));
    }
}
