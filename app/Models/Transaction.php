<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =[
        'sender_id',
        'sender_account_number',
        'recipient_id',
        'recipient_account_number',
        'amount',
        'exchanged_amount',
        'description'
    ];

    protected $casts = [
        'amount' => 'integer',
        'exchanged_amount' => 'integer'

    ];

    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'sender_account_number', 'number');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'recipient_account_number', 'number');
    }

    public function toAccountHolder()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function fromAccountHolder()
    {
        return $this->belongsTo(User::class, 'recipient_id', 'id');
    }

    public function getAmount()
    {
        return number_format(($this->amount/100),2);
    }

    public function getExchangedAmount()
    {
        return number_format(($this->exchanged_amount/100),2);
    }
}
