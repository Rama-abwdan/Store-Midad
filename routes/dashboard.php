<?php
use App\Http\Controllers\Dashboard\CategoriesController as DashboardCategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function () {
    Route::get("/index", [DashboardController::class, "index"])->name("index");
    Route::get('/categories/index', [DashboardCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [DashboardCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [DashboardCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [DashboardCategoriesController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/delete/{id}', [DashboardCategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/update/{id}', [DashboardCategoriesController::class, 'update'])->name('categories.update');
});
//Route::resource('categories',[CategoriesController::class])->except(['show']);
