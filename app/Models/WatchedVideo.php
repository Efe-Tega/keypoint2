<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchedVideo extends Model
{
    protected $guarded = [];

    public function video()
    {
        return $this->belongsTo(TaskVideo::class, 'task_video_id');
    }
}
