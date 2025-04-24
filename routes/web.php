<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Backend\NavigationController;
use App\Http\Controllers\Backend\TaskController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->controller(NavigationController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard');
});

Route::get('/admin-login', [AdminController::class, 'adminLogin']);
Route::post('/admin-login', [AdminController::class, 'login']);

Route::middleware('admin.auth')->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.index');


// Route::get('/run-queue', function () {
//     Artisan::call('queue:work --once');
//     return response()->json(['status' => 'queue worker triggered']);
// });

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
