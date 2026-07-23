<?php
use App\Http\Controllers\Dashboard\CategoriesController as DashboardCategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\StoresController;
use \App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\UserController as ControllersUserController;

Route::group(['prefix'=>'admin/dashboard','as'=>'dashboard.','middleware'=>['auth:admin']], function () {
    Route::get("/index", [DashboardController::class, "index"])->name("index");
    Route::get('/categories/index', [DashboardCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [DashboardCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [DashboardCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [DashboardCategoriesController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/delete/{id}', [DashboardCategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/update/{id}', [DashboardCategoriesController::class, 'update'])->name('categories.update');
    Route::match(['post','put'],'/translate/{group}/{field}',[\App\Http\Controllers\Dashboard\TranslationController::class,'translate'])->name('translations.translate')->where(['group'=>'[a-z_]+','field'=>'[a-z_]+']);
Route::resource('stores',StoresController::class);
Route::resource('products',ProductsController::class)->except(['show']);
Route::resource('users',\App\Http\Controllers\UserController::class)->except(['show']);
Route::get('/2fa', [\App\Http\Controllers\Dashboard\TwoFactorAuthicationController::class, 'index'])->name('admin.2fa');
Route::post('/translations/update/{group}/{field}', [\App\Http\Controllers\Dashboard\TranslationController::class, 'update'])->name('translations.update')->where(['group'=>'[a-z_]+','field'=>'[a-z_]+']);
    
    Route::post('/translations/destroy/{group}/{field}', [\App\Http\Controllers\Dashboard\TranslationController::class, 'destroy'])->name('translations.destroy')->where(['group'=>'[a-z_]+','field'=>'[a-z_]+']);

});
//Route::resource('categories',[CategoriesController::class])->except(['show']);
