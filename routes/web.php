<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//Route::redirect('/','/ar');
Route::get('switch-language/{locale}', [App\Http\Controllers\Front\LocalController::class, 'switch'])->name('locale.switch');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath'],
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


//require __DIR__.'/auth.php';
require __DIR__ . '/dashboard.php';
require __DIR__ . '/user.php';