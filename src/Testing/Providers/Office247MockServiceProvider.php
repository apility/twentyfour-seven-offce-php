<?php

namespace Apility\Office247\Testing\Providers;

use Illuminate\Support\ServiceProvider;

use Apility\Office247\Contracts\AuthServiceContract;
use Apility\Office247\Testing\Services\AuthService;

use Apility\Office247\Contracts\CompanyServiceContract;
use Apility\Office247\Testing\Services\CompanyService;

use Apility\Office247\Contracts\InvoiceServiceContract;
use Apility\Office247\Testing\Services\InvoiceService;

class Office247MockServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthServiceContract::class, AuthService::class);
        $this->app->bind(CompanyServiceContract::class, CompanyService::class);
        $this->app->bind(InvoiceServiceContract::class, InvoiceService::class);
    }
}
