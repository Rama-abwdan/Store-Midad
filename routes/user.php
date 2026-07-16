<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\StoreController;

Route::group(['prefix'=>'user','as'=>'user.','middleware'=>['auth:web']], function () {

Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
Route::get('/store/create',[StoreController::class,'create'])->name('store.create');
Route::post('/store/store',[StoreController::class,'store'])->name('store.store');

    Route::group(['middleware'=>['user.has.store']], function () {
        Route::get('/store/edit',[StoreController::class,'edit'])->name('store.edit');
        Route::post('/store/update',[StoreController::class,'update'])->name('store.update');
    });
});
