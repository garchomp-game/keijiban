<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Boad;

class BoadPolicy extends Policy
{
    public function update(User $user, Boad $boad)
    {
        // return $boad->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Boad $boad)
    {
        return true;
    }
}
