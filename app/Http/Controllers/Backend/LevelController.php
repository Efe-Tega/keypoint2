<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function viewLevels()
    {
        $user = Auth::user();
        $levels = Level::orderBy('id')->get();
        return view('user.content.level.index', compact('levels', 'user'));
    }
}
