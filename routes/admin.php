<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductAdminController;
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

        Route::prefix('orders')->name('orders.')->controller(OrderController::class)->group(function () {

            Route::get('/', 'index')->name('index');

            Route::prefix('{order}')->group(function () {

                Route::get('show', 'show')->name('show');

                Route::get('edit', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');

                Route::delete('destroy', 'destroy')->name('destroy');
            });
        });

        Route::prefix('products')->name('products.')->controller(ProductAdminController::class)->group(function () {

            Route::get('/', 'index')->name('index');

            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::prefix('{product}')->group(function () {

                Route::get('show', 'show')->name('show');

                Route::get('edit', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');

                Route::delete('remove-image/{image}', 'removeImage')->name('remove-image');

                Route::delete('destroy', 'destroy')->name('destroy');
            });
        });


        Route::prefix('categories')->name('categories.')->controller(CategoryController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');

                Route::prefix('{category}')->group(function () {

                    Route::get('show', 'show')->name('show');

                    Route::get('edit', 'edit')->name('edit');
                    Route::put('update', 'update')->name('update');

                    Route::delete('destroy', 'destroy')->name('destroy');
                });
            });

        Route::prefix('admins')->name('admins.')->controller(AdminController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');

                Route::prefix('{admin}')->group(function () {

                    Route::get('edit', 'edit')->name('edit');
                    Route::put('update', 'update')->name('update');

                    Route::delete('destroy', 'destroy')->name('destroy');
                });
            });

    });


});





