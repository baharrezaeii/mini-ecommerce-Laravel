<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard.index');

    })->name('index');

    Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {


        Route::prefix('login')->name('login.')->middleware('guest:admin')->group(function () {

            Route::get('/', 'login')->name('index');
            Route::post('/', 'loginPost')->name('post');
        });

        Route::get('logout', 'logout')->middleware('auth:admin')->name('logout');
    });
    Route::middleware('auth:admin')->group(function () {

        Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');

    });
});





