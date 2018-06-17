<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Chat extends Model
{
    protected $fillable = ['boards_id', 'user_id', 'comment'];

    public function board()
    {
        return $this->hasOne('App\Models\Board', 'id', 'boards_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
