<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        return view('user.content.withdraw.index', compact('wallet'));
    }
}
