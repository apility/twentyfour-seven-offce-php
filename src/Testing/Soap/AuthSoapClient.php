<?php

namespace Apility\Office247\Testing\Soap;

use Apility\Office247\Contracts\AuthSoapClientContract;
use Apility\Office247\Testing\Soap\MockSoapClient;

class AuthSoapClient extends MockSoapClient implements AuthSoapClientContract
{
    public function Login(array $loginRequest): array
    {
        return $this->pop('Login');
    }

    public function GetIdentity(): array
    {
        return $this->pop('GetIdentity');
    }
}
