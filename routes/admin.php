<?php

use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Admin\VideoManagement;
use Illuminate\Support\Facades\Route;

Route::controller(UserManagement::class)->group(function () {
    Route::get('/view_users', 'index')->name('view.users');
    Route::get('/user-details', 'userDetails')->name('user.details');
});

Route::controller(VideoManagement::class)->group(function () {
    Route::get('/add-video', 'addVideo')->name('add.video');
    Route::post('/post-video', 'postVideo')->name('post.video');
});
