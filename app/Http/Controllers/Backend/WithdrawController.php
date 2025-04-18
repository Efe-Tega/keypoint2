<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        return view('user.content.withdraw.index');
    }
}
