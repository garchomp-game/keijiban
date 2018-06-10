<?php

namespace App\Policies;

use App\Models\User as ModelUser;
use App\User;

class UserPolicy extends Policy
{
    public function update(ModelUser $m_user, User $user)
    {
        // return $user->user_id == $user->id;
        return true;
    }

    public function destroy(ModelUser $m_user, User $user)
    {
        return true;
    }
}
