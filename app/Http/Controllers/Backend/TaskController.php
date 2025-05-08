<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\PendingTask;
use App\Models\TaskVideo;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WatchedVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $user = Auth::user();
        $userId = $user->id;
        $pendingTask = PendingTask::where('user_id', $userId)
            ->first();

        $play = PendingTask::where('id', $id)->first();

        if ($play) {
            $video = TaskVideo::find($play->task_video_id);
            return view('user.content.task.task-detail', compact('video'));
        }

        if ($pendingTask) {
            return redirect()->route('task.list', ['id' => $pendingTask->task_video_id]);
        } else {
            PendingTask::insert([
                'user_id' => $userId,
                'task_video_id' => $id,
                'level_id' => $user->level_id,
                'created_at' => Carbon::now(),
            ]);

            $video = TaskVideo::findOrFail($id);

            return view('user.content.task.task-detail', compact('video'));
        }
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

        $taskData = TaskVideo::where('id', $taskId)->first();

        $earning = Earning::where('user_id', $user->id)->first();
        $earning->today_earning += $taskData->level->reward_amount;
        $earning->save();

        $wallet = Wallet::where('user_id', $user->id)->first();
        $wallet->com_wallet += $taskData->level->reward_amount;
        $wallet->save();

        PendingTask::where('task_video_id', $taskId)->delete();

        return response()->json(['message' => 'Task Completed!']);
    }

    public function taskList($id)
    {
        $video = PendingTask::where('id', $id)->first();
        $pendingTask = PendingTask::where('task_video_id', $id)->first();
        $watchedVideos = WatchedVideo::latest()->get();
        return view('user.content.task.task-list', compact('pendingTask', 'video', 'watchedVideos'));
    }
}
