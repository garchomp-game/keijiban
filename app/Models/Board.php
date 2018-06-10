<?php

namespace App\Models;

class Board extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function chats() {
        return $this->hasMany('App\Models\Chat', 'boards_id', 'id');
    }
}
