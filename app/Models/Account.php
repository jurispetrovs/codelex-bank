<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'holder_id',
        'currency',
        'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'holder_id', 'id');
    }

    public function debitTransactions()
    {
        return $this->hasMany(Transaction::class, 'recipient_account_number', 'number');
    }

    public function creditTransactions()
    {
        return $this->hasMany(Transaction::class, 'sender_account_number', 'number');
    }

    public function transactions()
    {
        return ($this->debitTransactions->merge($this->creditTransactions))->sortByDesc('created_at');
    }

    public function getBalance()
    {
        return number_format(($this->balance/100),2);
    }

    public function withdraw(int $amount)
    {
        if($this->balance >= $amount)
        {
            $this->update([
                'balance' => $this->balance - $amount
            ]);
        }
    }

    public function deposit(int $amount)
    {
        $this->update([
            'balance' => $this->balance + $amount
        ]);
    }
}
