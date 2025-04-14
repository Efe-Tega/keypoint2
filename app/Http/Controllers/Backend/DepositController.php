<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function recharge(Request $request)
    {
        return view('user.content.deposit.index');
    }
}
