<?php
use App\Http\Controllers\Dashboard\CategoriesController as DashboardCategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\StoresController;
use \App\Http\Controllers\Dashboard\UserController;

Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function () {
    Route::get("/index", [DashboardController::class, "index"])->name("index");
    Route::get('/categories/index', [DashboardCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [DashboardCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [DashboardCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [DashboardCategoriesController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/delete/{id}', [DashboardCategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/update/{id}', [DashboardCategoriesController::class, 'update'])->name('categories.update');
Route::resource('stores',StoresController::class);
Route::resource('products',ProductsController::class)->except(['show']);
Route::resource('users',UserController::class)->except(['show']);
});
//Route::resource('categories',[CategoriesController::class])->except(['show']);
