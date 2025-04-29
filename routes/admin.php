<?php

use App\Http\Controllers\Admin\AppSettings;
use App\Http\Controllers\Admin\LevelManagement;
use App\Http\Controllers\Admin\TaskManagement;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Admin\VideoManagement;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::controller(TaskManagement::class)->group(function () {
        Route::get('/add-task', 'addTask')->name('add.task');
        Route::get('/view-tasks', 'viewTask')->name('view.task');
        Route::get('/get-task', 'getTask')->name('get.task');
        Route::get('/edit-task/{id}', 'editTask')->name('edit.task');
        Route::get('/delete-task/{id}', 'deleteTask')->name('delete.task');

        Route::post('/post-task', 'postTask')->name('post.task');
        Route::post('/update-task', 'updateTask')->name('update.task');
    });

    Route::controller(UserManagement::class)->group(function () {
        Route::get('/view_users', 'index')->name('view.users');
        Route::get('/user-details/{id}', 'userDetails')->name('user.details');

        Route::post('/users/toggle-status/{id}', 'userToggleStatus');
        Route::post('/withdraw/toggle-status/{id}', 'withdrawToggleStatus');
    });

    Route::controller(AppSettings::class)->group(function () {
        Route::get('/settings', 'settings')->name('settings');
    });

    Route::controller(LevelManagement::class)->group(function () {
        Route::get('/view-level', 'viewLevel')->name('view.level');
        Route::get('/edit-level/{id}', 'editLevel')->name('edit.level');
        Route::get('/delete-level/{id}', 'destroyLevel')->name('delete.level');

        Route::post('/add-level', 'addLevel')->name('add.level');
        Route::post('/update-level/{id}', 'updateLevel')->name('update.level');
    });
});
