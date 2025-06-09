<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        if ($user && $user->status == 2) {

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

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendEmailResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $token = Str::random(60);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // send email with the reset link
        Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
        // Mail::send('emails.reset-password', [
        //     'token' => $token,
        //     'email' => $request->email,
        // ], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset your password');
        // });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function resetPassword($token, Request $request)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = DB::table('password_reset_tokens')->where([
            ['email', $request->email],
            ['token', $request->token]
        ])->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Invalid or Expired Token']);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        $notify = array(
            'message' => "Password has been reset!",
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notify);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
