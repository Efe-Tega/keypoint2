<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function account(Request $request)
    {
        return view('user.content.profile.index');
    }
}
