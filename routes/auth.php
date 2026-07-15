<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {

    Route::middleware('guest:web')->group(function () {
        Route::prefix('register')->name('register.')->controller(RegisterController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'post')->name('post');
        });
        Route::prefix('login')->name('login.')->controller(LogInController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'post')->name('post');
        });

    });

    Route::get('logout', [LogoutController::class, 'index'])->middleware('auth:web')->name('logout.index');


});
