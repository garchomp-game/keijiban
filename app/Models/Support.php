<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Support extends Model
{
    use Notifiable  ;
    protected $fillable = [
        'title', 'description', 'name'
    ];

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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';
    }
}
