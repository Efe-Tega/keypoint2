<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\LevelSubscription;
use App\Models\Wallet;
use Carbon\Carbon;
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

    public function upgradeLevel(Request $request)
    {
        $user = Auth::user();
        $level = Level::find($request->level_id);
        $userWallet = Wallet::where('user_id', $user->id)->first();
        $subscription = LevelSubscription::where('user_id', $user->id)->first();

        if (!$level) {
            return redirect()->back()->with('error', 'Invalid Level.');
        }

        if ($userWallet->acct_bal < $level->upgrade_amount) {
            return redirect()->route('recharge')->with('error', 'Insufficient balance');
        }

        // Deduct balance and upgrade
        $userWallet->acct_bal -= $level->upgrade_amount;
        $userWallet->deposit_wallet = $level->upgrade_amount;
        $userWallet->save();

        // add to subscription table
        $subscription->level_id = $level->id;
        $subscription->sub_amount = $level->upgrade_amount;
        $subscription->created_at = Carbon::now();
        $subscription->save();

        $user->level_id = $level->id;
        $user->save();

        return redirect()->back()->with('success', 'Upgrade successful!');
    }
}
