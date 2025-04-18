<?php

use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\NavigationController;
use App\Http\Controllers\Backend\TaskController;
use App\Http\Controllers\Backend\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::controller(NavigationController::class)->group(function () {
    Route::get('/account', 'account')->name('account');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('/personal-info', 'personalInfo')->name('personal.info');
    Route::get('/daily-report', 'dailyReport')->name('daily.report');
    Route::get('/account-change', 'accountChange')->name('account.change');
    Route::get('/user-wallet', 'userWallet')->name('user.wallet');
});

Route::controller(DepositController::class)->group(function () {
    Route::get('/recharge', 'recharge')->name('recharge');
});

Route::controller(TaskController::class)
    ->group(function () {
        Route::get('/task', 'index')->name('task');
        Route::get('/task/detail/{id}', 'taskDetail')->name('task.detail');
        Route::get('/task-list', 'taskList')->name('task.list');
    });

Route::controller(WithdrawController::class)->group(function () {
    Route::get('/withdraw', 'withdraw')->name('withdraw');
});
