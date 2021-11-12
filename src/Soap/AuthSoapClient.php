<?php

namespace Apility\Office247\Soap;

use Apility\Office247\Contracts\AuthSoapClientContract;
use Apility\Office247\Soap\SoapClient;

class AuthSoapClient extends SoapClient implements AuthSoapClientContract
{
    /** @var string */
    protected string $endpoint = '/authenticate/v001/authenticate.asmx?wsdl';

    public function Login(array $loginRequest): array
    {
        return $this->__call('Login', $loginRequest);
    }

    public function GetIdentity(): array
    {
        return $this->__call('GetIdentity', []);
    }
}
