<?php

namespace Apility\Office247\Testing\Soap;

use Apility\Office247\Contracts\CompanySoapClientContract;
use Apility\Office247\Testing\Soap\MockSoapClient;

class CompanySoapClient extends MockSoapClient implements CompanySoapClientContract
{

    public function GetCompanies(array $request): array
    {
        return $this->pop('GetCompanies');
    }

    public function SaveCompanies(array $companies): array
    {
        return $this->pop('SaveCompanies');
    }
}
