<?php

use App\Http\Controllers\Admin\AppSettings;
use App\Http\Controllers\Admin\TaskManagement;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Admin\VideoManagement;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::controller(TaskManagement::class)->group(function () {
        Route::get('/add-task', 'addTask')->name('add.task');
        Route::post('/post-task', 'postTask')->name('post.task');
    });

    Route::controller(UserManagement::class)->group(function () {
        Route::get('/view_users', 'index')->name('view.users');
        Route::get('/user-details', 'userDetails')->name('user.details');
    });

    Route::controller(AppSettings::class)->group(function () {
        Route::get('/settings', 'settings')->name('settings');
    });
});
