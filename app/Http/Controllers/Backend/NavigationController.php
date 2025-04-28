<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TaskVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $videos = TaskVideo::where('level_id', $user->level)->get();
        return view('user.index', compact('videos', 'user'));
    }
    public function account(Request $request)
    {
        return view('user.content.profile.index');
    }
}
