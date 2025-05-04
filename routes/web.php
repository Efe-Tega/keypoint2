<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Backend\NavigationController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\TaskController;
use App\Jobs\ResetUserTasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/run-schedule', function (Request $request) {
    if ($request->query('token') !== env('RESET_JOB_TOKEN')) {
        abort(403, 'Unauthorized');
    }

    while (true) {
        Artisan::call('queue:work --once');

        // Check if there's more work to do
        if (!\Queue::size()) {
            break;
        }

        sleep(1);
    }

    ResetUserTasks::dispatch();
    return 'Reset job dispatched';
});

// === User Authentication ===
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/user-registration', 'userRegistration')->name('user.registration');
    Route::post('/register', 'register')->name('register');
});


Route::middleware('auth')->controller(NavigationController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard');
});

Route::get('/admin-login', [AdminController::class, 'adminLogin']);
Route::post('/admin-login', [AdminController::class, 'login']);

Route::middleware('admin.auth')->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.index');

// === Payment Routes ===
Route::controller(PaymentController::class)->group(function () {
    Route::get('/pay', 'showForm')->name('payment.gateway');
    Route::get('/payment/callback', 'paymentCallback')->name('payment.callback');

    Route::post('/pay', 'initiatePayment')->name('payment.initiate');
});


// Route::get('/run-queue', function () {
//     while (true) {
//         Artisan::call('queue:work --once');

//         // Check if there's more work to do
//         if (!\Queue::size()) {
//             break;
//         }

//         sleep(1);
//     }

//     return response()->json(['status' => 'all available jobs processed']);
// });



require base_path('routes/user.php');
require base_path('routes/admin.php');
