<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ResetUserTasks;
use App\Models\BankInfo;
use App\Models\Level;
use App\Models\User;
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
        return view('admin.manage-user.user-details', compact('user', 'bank', 'levels'));
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
