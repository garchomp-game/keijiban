<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function board()
    {
        return $this->hasOne('App\Models\Board', 'id', 'boards_id');
    }
}
