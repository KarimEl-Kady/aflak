<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AboutUsFeatureController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\HomeSliderImageController;
use App\Models\HomeSlider\HomeSlider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::group(["prefix" => "admin"], function () {
            Route::group(["middleware" => "guest:admin"], function () {
                //login
                Route::get("login", [AuthController::class, "login"])->name("admin_loginpage");
                Route::post("admin_login", [AuthController::class, "admin_login"])->name("admin_login");
            });

            Route::group(["middleware" => "auth:admin"], function () {
                Route::get("logout", [AuthController::class, "logout"])->name("logout");

                //admins
                Route::resource('admins', AdminController::class);
                //home_sliders
                Route::get('home_sliders', [HomeSliderController::class, 'index'])->name('home_sliders.index');
                Route::post('home_sliders/update', [HomeSliderController::class, 'update'])->name('home_sliders.update');

                //home_slider_images
                Route::resource('home_slider_images', HomeSliderImageController::class);

                //advantages
                Route::resource('advantages', AdvantageController::class);

                //about_us
                Route::get('about_us', [AboutUsController::class, 'index'])->name('about_us.index');
                Route::post('about_us/update', [AboutUsController::class, 'update'])->name('about_us.update');

                //why_us_features
                Route::resource('about_us_features', AboutUsFeatureController::class);

            });
        });
    }
);
