<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettings extends Controller
{
    public function settings()
    {
        return view('admin.setting.index');
    }
}
