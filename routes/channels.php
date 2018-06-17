<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{id}', function($user, $boardId) {
    if (Room::where('from_user_id', $user->id)->orwhere('to_user_id', $user->id)->where('id', $boardId)->exists()) {
        return $user;
    } else {
        return false;
    }
});
