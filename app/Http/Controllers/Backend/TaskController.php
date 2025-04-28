<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TaskVideo;
use App\Models\User;
use App\Models\WatchedVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $watchedVideos = WatchedVideo::where('user_id', $user->id)
            ->pluck('task_video_id')
            ->toArray();
        $videos = TaskVideo::where('level_id', $user->level_id)
            ->whereNotIn('id', $watchedVideos)
            ->get();
        return view('user.content.task.index', compact('videos', 'user'));
    }

    public function taskDetail($id)
    {
        $video = TaskVideo::findOrFail($id);
        return view('user.content.task.task-detail', compact('video'));
    }

    public function rewardTask(Request $request)
    {
        $user = Auth::user();
        $user->remaining_task -= 1;
        $user->task_completed += 1;
        $user->save();

        $taskId = $request->input('task_id');

        WatchedVideo::insert([
            'user_id' => $user->id,
            'task_video_id' => $taskId,
            'created_at' => Carbon::now()
        ]);

        // $notification = array(
        //     'message' => 'Task Submitted',
        //     'alert-type' => 'success',
        // );

        return response()->json(['message' => 'Task Completed!']);
    }

    public function taskList()
    {
        return view('user.content.task.task-list');
    }
}
