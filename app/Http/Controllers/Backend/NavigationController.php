<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\MessageNotification;
use App\Models\TaskVideo;
use App\Models\User;
use App\Models\UserMessage;
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
        $message = UserMessage::where('user_id', $user->id)->where('status', 'unread');
        return view('user.index', compact('videos', 'user', 'message'));
    }

    public function account(Request $request)
    {
        $user = Auth::user();
        $earning = Earning::where('user_id', $user->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        return view('user.content.profile.index', compact('user', 'earning', 'wallet'));
    }

    public function companyInfo()
    {
        return view('user.content.company.index');
    }

    public function userInvitation(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.content.invite.index', compact('user'));
    }

    public function userMessage()
    {
        $userId = Auth::user()->id;
        $messages = UserMessage::where('user_id', $userId)
            ->latest()
            ->get();

        return view('user.content.message.index', compact('messages', 'userId'));
    }

    public function markAsRead(Request $request, $id)
    {
        $message = UserMessage::findOrFail($id);

        if ($message->status === 'unread') {
            $message->status = 'read';
            $message->save();
        }
        return response()->json(['success' => true]);
    }
}
