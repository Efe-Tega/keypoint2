<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BankInfo;
use App\Models\DepositTransaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
// use Str;

class AccountController extends Controller
{
    public function personalInfo(Request $request)
    {
        $user = Auth::user();
        $bankInfo = BankInfo::where('user_id', $user->id)->first();
        return view('user.content.profile.personal-info', compact('user', 'bankInfo'));
    }

    public function uploadPic(Request $request)
    {
        $user = Auth::user();
        $slug = Str::slug($user->fullname);
        $pics = $request->profile_pic;

        if ($request->hasFile('profile_pic')) {
            // Delete existing profile picture if it exists
            if ($user->profile_pic && File::exists(public_path($user->profile_pic))) {
                File::delete(public_path($user->profile_pic));
            }

            // Handle new image
            $manager = new ImageManager(new Driver());
            $picsName = $slug . '.' . $pics->getClientOriginalExtension();
            $storeImg = $manager->read($pics);
            $storeImg->save(base_path('public/upload/profile_pics/' . $picsName));
            $saveUrl = 'upload/profile_pics/' . $picsName;

            // Update user profile picture
            User::findOrFail($user->id)->update([
                'profile_pic' => $saveUrl
            ]);
        }

        return redirect()->back()->with('status', 'Profile Pics Updated Successfully');
    }

    public function updateInfo(Request $request)
    {
        $request->validate([
            'real_name' => 'required|string',
            'phone' => 'required|string',
            'acct_name' => 'required|string',
            'bank_name' => 'required',
            'acct_no' => 'required|int',
        ]);

        $userId = $request->id;

        User::find($userId)->update([
            'fullname' => $request->real_name,
            'phone' => $request->phone,
        ]);

        $fullname = $request->real_name;
        $acctName = $request->acct_name;

        if ($fullname !== $acctName) {
            $notify = array(
                'message' => 'Account Name does not match with Real Name',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notify);
        }

        if ($userId) {
            BankInfo::where('user_id', $userId)->update([
                'acct_name' => $request->acct_name,
                'bank_name' => $request->bank_name,
                'acct_no' => $request->acct_no,
            ]);
        } else {
            BankInfo::insert([
                'user_id' => $userId,
                'acct_name' => $request->acct_name,
                'bank_name' => $request->bank_name,
                'acct_no' => $request->acct_no,
            ]);
        }

        $notification = array(
            'message' => 'Profile Updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function dailyReport()
    {
        return view('user.content.profile.daily-report');
    }

    public function accountChange()
    {
        return view('user.content.profile.account-change');
    }

    public function userWallet()
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $transactions = DepositTransaction::where('user_id', $user->id)->latest()->get();
        return view('user.content.funds-management.user-wallet', compact('wallet', 'transactions'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password is Incorrect!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
