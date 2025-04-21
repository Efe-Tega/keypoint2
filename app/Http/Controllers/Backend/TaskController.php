<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TaskVideo;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $videos = TaskVideo::all();
        return view('user.content.task.index', compact('videos'));
    }

    public function taskDetail($id)
    {
        $video = TaskVideo::findOrFail($id);

        return view('user.content.task.task-detail', compact('video'));
    }

    public function taskList()
    {
        return view('user.content.task.task-list');
    }
}
