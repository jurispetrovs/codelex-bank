<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->id = auth()->id();
    }

    public function create(User $user)
    {
        return $user->id = auth()->id();
    }

    public function view(User $user, Account $account)
    {
        return $user->id === $account->holder_id;
    }

    public function update(User $user, Account $account)
    {
        return $user->id === $account->holder_id;
    }

    public function delete(User $user, Account $account)
    {
        return $user->id === $account->holder_id;
    }
}
