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

    public function pending()
    {
        return $this->hasMany(PendingTask::class);
    }

    public function watchVideo()
    {
        return $this->hasMany(WatchedVideo::class);
    }
}
