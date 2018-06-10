<?php

namespace App\Policies;

use App\User;
use App\Models\Board;

class BoardPolicy extends Policy
{
    public function update(User $user, Board $board)
    {
        // return $board->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Board $board)
    {
        return true;
    }
}
