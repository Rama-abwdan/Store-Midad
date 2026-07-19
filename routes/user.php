<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\TwoFactoreAuthenticationController;
Route::group(['prefix'=>'user','as'=>'user.','middleware'=>['auth:web']], function () {

Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
Route::get("/2fa", [TwoFactoreAuthenticationController::class, "index"])->name("2fa");
Route::get('/store/create',[StoreController::class,'create'])->name('store.create');
Route::post('/store/store',[StoreController::class,'store'])->name('store.store');

    Route::group(['middleware'=>['user.has.store']], function () {
        Route::get('/store/edit',[StoreController::class,'edit'])->name('store.edit');
        Route::post('/store/update',[StoreController::class,'update'])->name('store.update');
        Route::resource('products',ProductController::class);
        Route::get('/team',[TeamController::class,'index'])->name('teams.index');
        Route::get('/team/create',[TeamController::class,'create'])->name('teams.create');
        Route::post('/team/store',[TeamController::class,'store'])->name('teams.store');
        Route::get('/team/edit/{member}',[TeamController::class,'edit'])->name('teams.edit');
        Route::post('/team/update/{member}',[TeamController::class,'update'])->name('teams.update');
        Route::delete('/team/destroy/{member}',[TeamController::class,'destroy'])->name('teams.destroy');
    });
});
