<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use App\Models\WithdrawTransaction;
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
        WithdrawTransaction::findOrFail($id)->update([
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Status Updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
