<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {

            Route::get('/', 'index')->name('index');

            Route::prefix('{user}')->group(function () {

                Route::get('show', 'show')->name('show');

                Route::get('edit', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');

                Route::delete('destroy', 'destroy')->name('destroy');

            });


        });


    });
});





