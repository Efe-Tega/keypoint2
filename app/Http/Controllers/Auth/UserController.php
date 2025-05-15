<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BankInfo;
use App\Models\Earning;
use App\Models\LevelSubscription;
use App\Models\MessageNotification;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserMessage;
use App\Models\UserTask;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin(Request $request)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('auth.user-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user->status == 2) {

            $notification = array(
                'message' => 'Account Restricted! Contact support',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard');
        };

        $notification = array(
            'message' => 'Email or Password is incorrect!',
            'alert-type' => 'error'
        );

        return back()->with($notification);
    }

    public function userRegistration(Request $request)
    {
        $referralCode = $request->query('ref');
        return view('auth.user-registration', compact('referralCode'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $code = generateCode();

        $userId = User::insertGetId([
            'email' => $request->email,
            'phone' => $request->phone,
            'referral_code' => $code,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        if ($request->filled('referral_code')) {
            $referrer = User::where('referral_code', $request->referral_code)->first();

            if ($referrer) {
                Referral::insert([
                    'user_id' => $userId,
                    'referred_by' => $referrer->id,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $welcomeMessage = MessageNotification::where('message_key', 'greetings')->first();

        UserMessage::insert([
            'user_id' => $userId,
            'message_notification_id' => $welcomeMessage->id,
            'created_at' => Carbon::now(),
        ]);

        BankInfo::insert(['user_id' => $userId]);
        UserTask::create(['user_id' => $userId]);
        Wallet::create(['user_id' => $userId]);
        Earning::create(['user_id' => $userId]);
        LevelSubscription::create(['user_id' => $userId]);

        $notification = array(
            'message' => 'Account Created Successfully',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
