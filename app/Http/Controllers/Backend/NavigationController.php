<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\TaskVideo;
use App\Models\User;
use App\Models\Wallet;
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
            ->whereNotIn('id', $watchedVideo)->take(10)->get();
        return view('user.index', compact('videos', 'user'));
    }

    public function account(Request $request)
    {
        $user = Auth::user();
        $earning = Earning::where('user_id', $user->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        return view('user.content.profile.index', compact('user', 'earning', 'wallet'));
    }

    public function userInvitation(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.content.invite.index', compact('user'));
    }
}
