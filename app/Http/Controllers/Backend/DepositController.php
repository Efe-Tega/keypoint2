<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function recharge(Request $request)
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        return view('user.content.deposit.index', compact('wallet'));
    }

    public function rechargeDetails()
    {
        return view('user.content.deposit.deposit-details');
    }
}
