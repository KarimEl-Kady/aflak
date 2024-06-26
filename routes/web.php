<?php

use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\CommonQuestionController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\EmailNewsController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\MessageController;
use App\Http\Controllers\Website\PrivacyController;
use App\Http\Controllers\Website\RequestController;
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
        Route::post('send_email', [EmailNewsController::class, 'send_email'])->name('send_email');


        Route::get('services', [ServiceController::class, 'index'])->name('services');

        Route::get('about_us', [AboutUsController::class, 'index'])->name('about_us');


        Route::get('blog', [BlogController::class, 'index'])->name('blog');
        Route::get('blog/{id}', [BlogController::class, 'show'])->name('blog.show');


        Route::post('send_request', [RequestController::class, 'send_request'])->name('send_request');

        Route::post('send_message', [MessageController::class, 'send_message'])->name('send_message');

        Route::get('privacies', [PrivacyController::class, 'index'])->name('privacies'); // Privacy Page Route

        Route::get('common_questions', [CommonQuestionController::class, 'index'])->name('common_questions'); // Common Questions Page Route

    }
);
