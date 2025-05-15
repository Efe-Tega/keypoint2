<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageNotification extends Model
{
    protected $guarded = [];

    public function userMessage()
    {
        return $this->hasMany(UserMessage::class);
    }
}
