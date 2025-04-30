<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingTask extends Model
{
    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(TaskVideo::class, 'task_video_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
