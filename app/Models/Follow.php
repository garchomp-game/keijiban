<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public static function follow($user, $login_user)
    {
        $follow = new Follow;
        $follow->login_user_id = $login_user;
        $follow->user_id = $user;
        return $follow->save();
    }
    public static function unfollow()
    {
        return Follow::where('login_user_id', $login_user)
        ->where('user_id', $user)
        ->delete();
    }
}
