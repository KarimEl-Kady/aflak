<?php

namespace App\Providers;

use App\Models\NewsEmail\NewsEmaillSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Schema::defaultStringLength(191);
        // $news_email_setting = NewsEmaillSetting::firstOrNew();
        // View::share('news_email_setting', $news_email_setting);
    }
}
