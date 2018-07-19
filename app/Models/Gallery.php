<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
	'title', 'description', 'content_id', 'content_type'
    ];
    public function users()
    {
	return $this->hasOne('App\User');
    }
}
