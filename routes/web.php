<?php

use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('/', [IndexController::class, 'index'])->name('home');
        Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us');

        Route::get('services', [ServiceController::class, 'index'])->name('services');

    });
