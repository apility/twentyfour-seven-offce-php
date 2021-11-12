<?php

namespace Apility\Office247\Soap;

use Apility\Office247\Soap\SoapClient;
use Apility\Office247\Concerns\AuthenticatesSoapSession;
use Apility\Office247\Contracts\CompanySoapClientContract;

class CompanySoapClient extends SoapClient implements CompanySoapClientContract
{
    use AuthenticatesSoapSession;

    /** @var string */
    protected string $endpoint = '/CRM/Company/V001/CompanyService.asmx?wsdl';

    public function GetCompanies(array $request): array
    {
        return $this->__call('GetCompanies', [$request]);
    }

    public function SaveCompanies(array $companies): array
    {
        return $this->__call('SaveCompanies', [$companies]);
    }
}
