<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Contract\ContractController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\Details\UserOfferController;
use App\Http\Controllers\Admin\Details\UserRequestController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\NotificationDashboardController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\PaymentOrderController;
use App\Http\Controllers\Admin\PaymentWayController;
use App\Http\Controllers\Admin\Post\PostCommentController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\UpgrateController;
use App\Http\Controllers\Admin\WorldTermController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::group(["prefix" => "ciadmin"], function () {
            Route::group(["middleware" => "guest:admin"], function () {
                //login
                Route::get("login", [AuthController::class, "login"])->name("admin_loginpage");
                Route::post("admin_login", [AuthController::class, "admin_login"])->name("admin_login");
            });

            Route::group(["middleware" => "auth:admin"], function () {
                Route::get("logout", [AuthController::class, "logout"])->name("logout");

                //admins
                Route::resource('admins', AdminController::class);

                //requests
                Route::resource('requests', RequestController::class);

                //home_banners
                Route::resource('home_banners', HomeBannerController::class);

                //upgrates   //refuse   //accept
                Route::resource('upgrates', UpgrateController::class);
                Route::post('refuse_upgrates', [UpgrateController::class, 'refuse_upgrates'])->name('refuse_upgrates');
                Route::post('accept_upgrates', [UpgrateController::class, 'accept_upgrates'])->name('accept_upgrates');

                //details   //offers   //requests
                Route::resource('details', DetailController::class);
                Route::get('details/requests/{id}', [UserRequestController::class, 'index'])->name('details.requestts.index');
                Route::get('details/offers/{id}', [UserOfferController::class, 'index'])->name('details.ofers.index');

                //payment_orders
                Route::resource('payment_orders', PaymentOrderController::class);
                Route::post('refuse_orders', [PaymentOrderController::class, 'refuse_orders'])->name('refuse_orders');
                Route::post('accept_orders', [PaymentOrderController::class, 'accept_orders'])->name('accept_orders');

                //settings
                Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
                Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

                //requests
                Route::get('requests', [RequestController::class, 'index'])->name('requests.index');

                //offers
                Route::get('offers', [OfferController::class, 'index'])->name('offers.index');

                //privacies
                Route::get('privacies', [PrivacyController::class, 'index'])->name('privacies.index');
                Route::post('privacies/update', [PrivacyController::class, 'update'])->name('privacies.update');

                //terms
                Route::get('terms', [TermController::class, 'index'])->name('terms.index');
                Route::post('terms/update', [TermController::class, 'update'])->name('terms.update');

                //world_terms
                Route::get('wallet_terms', [WorldTermController::class, 'index'])->name('world_terms.index');
                Route::post('wallet_terms/update', [WorldTermController::class, 'update'])->name('world_terms.update');

                //questions
                Route::resource('questions', QuestionController::class);

                //payment_ways
                Route::resource('payment_ways', PaymentWayController::class);


                //settings
                Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
                Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

                //posts
                Route::get("posts", [PostController::class, "index"])->name("posts.index");

                //comments
                Route::get("comments/{id}", [PostCommentController::class, "index"])->name("comments.index");

                //Contracts
                Route::get('contracts', [ContractController::class, 'index'])->name('contracts.index');
                Route::post('contracts/update', [ContractController::class, 'update'])->name('contracts.update');

                //notifications
                Route::controller(NotificationDashboardController::class)->name('notifications.')->prefix('notifications')->group(function () {
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                });
            });
        });
    }


);
