<?php

namespace Apility\Office247\Contracts;

use Apility\Office247\Exceptions\AuthException;

use Apility\Office247\Contracts\SoapClientContract;

use Apility\Office247\Types\GetIdentityResponse;
use Apility\Office247\Types\LoginResponse;

interface AuthServiceContract extends SoapServiceContract
{
    /**
     * @return boolean
     */
    public function Authenticated(): bool;

    /**
     * @throws LoginException
     * @return LoginResponse
     */
    public function Login(): LoginResponse;

    /**
     * @param string|null $sessionId
     * @return bool
     * @throws AuthException
     */
    public function AuthenticateSession(?string $sessionId = null): bool;

    /**
     * @param SoapClientContract $client
     * @return SoapClientContract
     * @throws AuthException
     */
    public function AuthenticateSoapClient(SoapClientContract $client): SoapClientContract;

    /**
     * @return IdentityResult
     */
    public function GetIdentity(): GetIdentityResponse;
}
