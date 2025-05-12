<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\WithdrawRequestAdmin;
use App\Models\BankInfo;
use App\Models\Wallet;
use App\Models\WithdrawTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $bankInfo = BankInfo::where('user_id', $user->id)->first();
        return view('user.content.withdraw.index', compact('wallet', 'bankInfo'));
    }

    public function withdrawRequest(Request $request)
    {
        $request->validate([
            'withdraw_acct' => 'required|string',
            'wallet' => 'required',
            'amount' => 'required',
        ], [
            'withdraw_acct.required' => 'Please update bank account details in profile page',
            'amount.required' => 'Please select amount below',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $today = Carbon::today();
        $now = Carbon::now();

        if ($now->isSaturday() || $now->isSunday()) {
            return redirect()->back()->with('withdrawal', 'Withdrawal is only from Monday to Friday');
        }

        $hasWithdrawnToday = WithdrawTransaction::where('user_id', $user->id)
            ->whereDate('created_at', $today)
            ->whereIn('status', ['pending', 'success'])
            ->exists();

        if ($hasWithdrawnToday) {
            return redirect()->back()->with('withdrawal', 'You have already made a withdrawal today.');
        }

        $reference = strtoupper(uniqid("TXN_"));

        $wallet = Wallet::where('user_id', $user->id)->first();

        if ($amount > $wallet->com_wallet) {
            WithdrawTransaction::insert([
                'user_id' => $user->id,
                'amount' => $amount,
                'trans_id' => $reference,
                'status' => 'failed',
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('error', 'Insufficient Balance');
        }

        $wallet->com_wallet -= $amount;
        $wallet->save();

        WithdrawTransaction::insert([
            'user_id' => $user->id,
            'amount' => $amount,
            'trans_id' => $reference,
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        Mail::to('admin@gmail.com')->send(new WithdrawRequestAdmin($user, $amount));

        // Send Plain email to user
        Mail::raw("Hi {$user->fullname}, \n\nYou have made a withdrawal request of NGN" . number_format($amount, 2) . ". Your request is being processed and you will receive your money soon. \n\nThanks, \n" . config('app.name'), function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Withdrawal Request Received');
        });

        return redirect()->back()->with('success', 'Withdraw Successful');
    }
}
