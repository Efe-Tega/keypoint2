<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskVideo extends Model
{
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
