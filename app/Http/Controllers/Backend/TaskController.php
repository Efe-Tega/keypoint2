<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TaskVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $videos = TaskVideo::where('level_id', $user->level)->get();
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
