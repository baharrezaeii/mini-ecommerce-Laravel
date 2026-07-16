<?php

use App\Http\Controllers\Account\AccountOrderController;
use App\Http\Controllers\Account\EditProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->name('account.')->middleware('auth')->group(function (){

    Route::get('orders',[AccountOrderController::class,'index'])->name('orders');

    Route::prefix('edit-profile')->name('edit-profile.')->controller(EditProfileController::class)
        ->group(function (){

            Route::get('/','index')->name('index');
            Route::post('/','post')->name('post');

        });
});
