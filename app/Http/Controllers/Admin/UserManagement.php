<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ResetUserTasks;
use App\Models\BankInfo;
use App\Models\DepositTransaction;
use App\Models\Level;
use App\Models\User;
use App\Models\WithdrawTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{
    public function index()
    {
        $users = User::with('wallet')->get();
        return view('admin.manage-user.index', compact('users'));
    }

    public function userDetails($id)
    {
        $bank = BankInfo::where('user_id', $id)->first();
        $user = User::findOrFail($id);
        $levels = Level::all();

        $deposits = DepositTransaction::select('id', 'user_id', 'trans_id', 'amount', 'status', 'created_at')->get()
            ->map(function ($item) {
                $item->type = 'Deposit';
                return $item;
            });

        $withdrawals = WithdrawTransaction::select('id', 'user_id', 'trans_id', 'amount', 'status', 'created_at')->get()
            ->map(function ($item) {
                $item->type = 'Withdrawal';
                return $item;
            });

        $transactions = $deposits->merge($withdrawals)->where('user_id', $id)
            ->sortByDesc('created_at')
            ->values();

        return view('admin.manage-user.user-details', compact('user', 'bank', 'levels', 'transactions'));
    }

    public function userToggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status == 1 ? 2 : 1;
        $user->save();

        return response()->json(['message' => 'User status updated!']);
    }

    public function withdrawToggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->withdraw_status = $user->withdraw_status == 1 ? 2 : 1;
        $user->save();

        return response()->json(['message' => 'Withdraw Status Changed!']);
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'level_id' => 'required',
        ]);

        $userId = $request->id;

        User::findOrFail($userId)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'level_id' => $request->level_id,
        ]);

        $notification = array(
            'message' => 'User details updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        User::findOrFail($id)->update([
            'password' => Hash::make('user01236'),
        ]);

        return redirect()->back()->with('success', $user->fullname . ' password has been changed');
    }
}
