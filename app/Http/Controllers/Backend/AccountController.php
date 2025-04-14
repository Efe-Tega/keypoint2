<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function personalInfo(Request $request)
    {
        return view('user.content.profile.personal-info');
    }

    public function dailyReport()
    {
        return view('user.content.profile.daily-report');
    }

    public function accountChange()
    {
        return view('user.content.profile.account-change');
    }

    public function userWallet()
    {
        return view('user.content.funds-management.user-wallet');
    }
}
