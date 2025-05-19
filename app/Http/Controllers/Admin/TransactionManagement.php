<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use App\Models\MessageNotification;
use App\Models\UserMessage;
use App\Models\Wallet;
use App\Models\WithdrawTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionManagement extends Controller
{
    public function depositTransactions(Request $request)
    {
        $deposits = DepositTransaction::all();
        return view('admin.transactions.deposit', compact('deposits'));
    }

    public function editTransaction(Request $request, $id)
    {
        $type = $request->query('type');

        if ($type === 'Deposit') {
            $transaction = DepositTransaction::findOrFail($id);

            return view('admin.transactions.edit-deposit', compact('transaction'));
        } elseif ($type === 'Withdrawal') {
            $transaction = WithdrawTransaction::findOrFail($id);
            return view('admin.transactions.edit-withdraw', compact('transaction'));
        } else {
            abort(404, 'Invalid Transaction');
        }
    }

    public function editDeposit(Request $request, $id)
    {

        $transaction = DepositTransaction::findOrFail($id);
        return view('admin.transactions.edit-deposit', compact('transaction'));
    }

    public function updateDepositTransaction(Request $request)
    {
        $request->validate([
            'trans_id' => 'required|string',
            'amount' => 'required',
            'status' => 'required'
        ]);

        $id = $request->id;

        DepositTransaction::findOrFail($id)->update([
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Status Updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function withdrawTransaction()
    {
        $withdrawals = WithdrawTransaction::latest()->get();
        return view('admin.transactions.withdraw', compact('withdrawals'));
    }

    public function editWithdrawal($id)
    {
        $transaction = WithdrawTransaction::findOrFail($id);
        return view('admin.transactions.edit-withdraw', compact('transaction'));
    }

    public function updateWithdrawTransaction(Request $request)
    {
        $request->validate([
            'trans_id' => 'required|string',
            'amount' => 'required',
            'status' => 'required'
        ]);

        $id = $request->id;
        $withdrawTransaction = WithdrawTransaction::findOrFail($id);
        $failedMsg = MessageNotification::where('message_key', 'failed_withdraw')->first();

        $userId = $withdrawTransaction->user_id;
        $amount = $withdrawTransaction->amount;

        $wallet = Wallet::where('user_id', $userId)->first();

        $withdrawTransaction->update([
            'status' => $request->status,
        ]);

        if ($request->status === "success") {
            UserMessage::insert([
                'user_id' => $userId,
                'message' => 'Your withdraw of ' . $amount . ' was successful.',
                'created_at' => Carbon::now(),
            ]);
        }

        if ($request->status === 'failed') {
            UserMessage::insert([
                'user_id' => $userId,
                'message_notification_id' => $failedMsg->id,
                'created_at' => Carbon::now(),
            ]);

            $wallet->com_wallet += $amount;
            $wallet->save();
        }

        $notification = array(
            'message' => 'Status Updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
