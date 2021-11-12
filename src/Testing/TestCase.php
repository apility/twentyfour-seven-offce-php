<?php

namespace Apility\Office247\Testing;

use PHPUnit\Framework\TestCase as BaseTestCase;

use Apility\Testing\Laravel;
use Apility\Office247\Testing\Providers\Office247MockServiceProvider;

use Illuminate\Cache\CacheServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /** @var Laravel */
    protected $app;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app = Laravel::createApplication()
            ->withConfig([
                'cache' => [
                    'default' => 'null',
                    'stores' => [
                        'null' => [
                            'driver' => 'null',
                        ],
                    ],
                ],
            ])
            ->withFrameworkProvider(CacheServiceProvider::class)
            ->withProvider(Office247MockServiceProvider::class)
            ->boot();
    }
}
