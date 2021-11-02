<?php

namespace Apility\TwentyfourSevenOffice\Providers;

use Illuminate\Support\ServiceProvider;

use Apility\TwentyfourSevenOffice\Services\AuthService;
use Apility\TwentyfourSevenOffice\Facades\Auth;
use Apility\TwentyfourSevenOffice\Services\CompanyService;
use Apility\TwentyfourSevenOffice\Services\InvoiceService;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class TwentyfourSevenOfficeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('twentyfoursevenoffice.auth', function () {
            return new AuthService(Config::get('twentyfoursevenoffice.credentials'));
        });

        $this->app->bind('twentyfoursevenoffice.company', CompanyService::class);
        $this->app->bind('twentyfoursevenoffice.invoice', InvoiceService::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/twentyfoursevenoffice.php' => config_path('twentyfoursevenoffice.php'),
        ]);

        if ($sessionId = Cache::get('twentyfoursevenoffice.session_id')) {
            Auth::authenticateSession($sessionId);
        }
    }
}
