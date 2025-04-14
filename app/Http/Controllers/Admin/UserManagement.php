<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    public function index()
    {
        return view('admin.manage-user.index');
    }

    public function userDetails()
    {
        return view('admin.manage-user.user-details');
    }
}
