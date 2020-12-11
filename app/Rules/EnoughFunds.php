<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EnoughFunds implements Rule
{
    /**
     * @var int
     */
    private $balance;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function passes($attribute, $value)
    {
        $value = (int)($value * 100);

        return $this->balance >= $value;
    }

    public function message()
    {
        return 'Insufficient funds.';
    }
}
