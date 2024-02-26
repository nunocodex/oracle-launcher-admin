<?php

namespace App\Policies\Vision;

use App\Models\User;
use App\Models\Vision\AccountData;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountDataPolicy
{
    use HandlesAuthorization;

    public function create(User $user, AccountData $accountData): bool
    {
        return false;
    }

    public function delete(User $user, AccountData $accountData): bool
    {
        return false;
    }

    public function view(User $user, AccountData $accountData): bool
    {
        return false;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function update(User $user, AccountData $accountData): bool
    {
        return true;
    }
}
