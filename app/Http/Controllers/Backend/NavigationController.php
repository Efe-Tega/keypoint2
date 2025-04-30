<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TaskVideo;
use App\Models\WatchedVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $watchedVideo = WatchedVideo::where('user_id', $user->id)
            ->pluck('task_video_id')
            ->toArray();
        $videos = TaskVideo::where('level_id', $user->level_id)
            ->whereNotIn('id', $watchedVideo)->get();
        return view('user.index', compact('videos', 'user'));
    }
    public function account(Request $request)
    {
        $user = Auth::user();
        return view('user.content.profile.index', compact('user'));
    }
}
