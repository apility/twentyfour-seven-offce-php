<?php

namespace Apility\TwentyfourSevenOffice\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool authenticateSession(?string $sessionId)
 * @method static \Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient authenticateSoapClient(\Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient $client)
 * @method static \Apility\TwentyfourSevenOffice\Types\Auth\IdentityResult identity()
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
        return 'twentyfoursevenoffice.auth';
    }
}
