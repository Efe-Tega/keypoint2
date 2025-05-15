<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $guarded = [];

    public function messageNotification()
    {
        return $this->belongsTo(MessageNotification::class);
    }
}
