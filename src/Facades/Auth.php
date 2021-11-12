<?php

namespace Apility\Office247\Facades;

use Illuminate\Support\Facades\Facade;
use Apility\Office247\Contracts\AuthServiceContract;

/**
 * @method static bool AuthenticateSession(?string $sessionId)
 * @method static \Apility\Office247\Soap\SoapClient AuthenticateSoapClient(\Apility\Office247\Soap\SoapClient $client)
 * @method static \Apility\Office247\Types\GetIdentityResponse GetIdentity()
 */
class Auth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AuthServiceContract::class;
    }
}
