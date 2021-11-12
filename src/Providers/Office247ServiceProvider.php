<?php

namespace Apility\Office247\Providers;

use Illuminate\Support\ServiceProvider;

use Apility\Office247\Services\AuthService;
use Apility\Office247\Facades\Auth;
use Apility\Office247\Services\CompanyService;
use Apility\Office247\Services\InvoiceService;
use Apility\Office247\Types\LoginResponse;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

use Apility\Office247\Contracts\AuthServiceContract;
use Apility\Office247\Contracts\CompanyServiceContract;
use Apility\Office247\Contracts\InvoiceServiceContract;

class Office247ServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthServiceContract::class, function () {
            return new AuthService(Config::get('twentyfoursevenoffice.credentials'));
        });

        $this->app->bind(CompanyServiceContract::class, CompanyService::class);
        $this->app->bind(InvoiceServiceContract::class, InvoiceService::class);
    }

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/twentyfoursevenoffice.php' => config_path('twentyfoursevenoffice.php'),
        ]);

        $configHash = md5(serialize(Config::get('twentyfoursevenoffice')));

        // If configuration has changed, we invalidate the cached session
        // to ensure the correct credentials are used.
        if (Cache::get('twentyfoursevenoffice.config_hash', null) !== $configHash) {
            Cache::forget('twentyfoursevenoffice.login_response');
            Cache::forever('twentyfoursevenoffice.config_hash', $configHash);
        }

        /** @var LoginResponse $loginResponse */
        if ($loginResponse = Cache::get('twentyfoursevenoffice.login_response')) {;
            Auth::authenticateSession($loginResponse->LoginResult);
        }
    }
}
