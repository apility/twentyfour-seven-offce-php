<?php

namespace Apility\Office247\Testing\Services;

use Apility\Office247\Services\AuthService as Service;
use Apility\Office247\Testing\Soap\AuthSoapClient;

class AuthService extends Service
{
    public function __construct()
    {
        $this->client = new AuthSoapClient();

        $this->credentials = [
            'Username' => 'test@example.com',
            'Password' => 'test',
            'ApplicationId' => '00000000-0000-0000-0000-000000000000',
            'IdentityId' => '00000000-0000-0000-0000-000000000000',
        ];

        $this->loginResponse = null;
    }
}
