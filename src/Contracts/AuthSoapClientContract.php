<?php

namespace Apility\Office247\Contracts;

interface AuthSoapClientContract extends SoapClientContract
{
    public function Login(array $loginRequest): array;

    public function GetIdentity(): array;
}
