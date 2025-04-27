<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankInfo;
use App\Models\User;
use Illuminate\Http\Request;

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
        $user = User::findOrFail($id)->first();
        return view('admin.manage-user.user-details', compact('user', 'bank'));
    }

    public function userToggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status == 1 ? 2 : 1;
        $user->save();

        return response()->json(['message' => 'User status updated successfully!']);
    }

    public function withdrawToggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->withdraw_status = $user->withdraw_status == 1 ? 2 : 1;
        $user->save();

        return response()->json(['message' => 'Withdraw Status Changed!']);
    }
}
