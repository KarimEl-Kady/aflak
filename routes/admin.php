<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AboutUsFeatureController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommonQuestionController;
use App\Http\Controllers\Admin\EmailNewsController;
use App\Http\Controllers\Admin\HashtagController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\HomeSliderImageController;
use App\Http\Controllers\Admin\JoinSectionController;
use App\Http\Controllers\Admin\LogisiticSectionController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsEmailSettingController;
use App\Http\Controllers\Admin\OurGoalController;
use App\Http\Controllers\Admin\OurStoryController;
use App\Http\Controllers\Admin\OurStoryFeatureController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\RequestSectionController;
use App\Http\Controllers\Admin\RequestSectionSettingController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFeatureController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StepController;
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
                Route::delete('about_us/destroy_image/{id}', [AboutUsController::class, 'destroy_image'])
                ->name('about_us.destroy_image');
                //why_us_features
                Route::resource('about_us_features', AboutUsFeatureController::class);

                //services
                Route::resource('services', ServiceController::class);

                //service_features
                Route::resource('service_features', ServiceFeatureController::class);

                //steps
                Route::resource('steps', StepController::class);

                //hashtags
                Route::resource('hashtags', HashtagController::class);

                //sections
                Route::resource('sections', SectionController::class);

                //blogs
                Route::resource('blogs', BlogController::class);

                //clients
                Route::resource('clients', ClientController::class);

                //email_news
                Route::resource('email_news', EmailNewsController::class);

                //email_news_seeting
                Route::resource('news_email_settings', NewsEmailSettingController::class);
                Route::post('news_email_settings/update', [NewsEmailSettingController::class, 'update'])->name('news_email_settings.update');

                //messages
                Route::resource('messages', MessageController::class);


                //join_sections
                Route::resource('join_sections', JoinSectionController::class);

                //our_stories
                Route::resource('our_stories', OurStoryController::class);
                Route::post('our_stories/update', [OurStoryController::class, 'update'])->name('our_stories.update');
                Route::delete('our_stories/destroy_features/{id}', [OurStoryController::class, 'destroy_features'])->name('our_stories.destroy_features');
                Route::delete('our_stories/destroy_stroy_image/{id}', [OurStoryController::class, 'destroy_stroy_image'])->name('our_stories.destroy_stroy_image');

                //our_goals
                Route::resource('our_goals', OurGoalController::class);
                Route::post('our_goals/update', [OurGoalController::class, 'update'])->name('our_goals.update');

                Route::delete('our_goals/destroy_features/{id}', [OurGoalController::class, 'destroy_features'])->name('our_goals.destroy_features');

                //our_story_features
                // Route::resource('our_story_features', OurStoryFeatureController::class);
                // Route::post('our_story_features/update', [OurStoryFeatureController::class, 'update'])->name('our_story_features.update');

                //logisitic_setcions
                Route::resource('logisitic_setcions', LogisiticSectionController::class);
                Route::post('logisitic_setcions/update', [LogisiticSectionController::class, 'update'])->name('logisitic_setcions.update');

                //request_sections
                Route::resource('request_sections', RequestSectionController::class);
                Route::post('request_sections/update', [RequestSectionController::class, 'update'])->name('request_sections.update');

                //request_section_settings
                Route::resource('request_section_settings', RequestSectionSettingController::class);
                Route::post('request_section_settings/{request_section_setting}', [RequestSectionSettingController::class, 'update'])->name('request_section_settings.update');

                //requests
                Route::resource('requests', RequestController::class);

                //settings
                Route::resource('settings', SettingController::class);
                Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

                //privacies
                Route::get('privacies', [PrivacyController::class, 'index'])->name('privacies.index');
                Route::post('privacies/update', [PrivacyController::class, 'update'])->name('privacies.update');

                //common_question
                Route::resource('common_questions', CommonQuestionController::class);
                //
            });
        });
    }
);
