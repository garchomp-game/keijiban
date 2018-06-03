<?php

namespace App\Policies;

use App\Models\User;
use App\Models\User;

class UserPolicy extends Policy
{
    public function update(User $user, User $user)
    {
        // return $user->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, User $user)
    {
        return true;
    }
}
