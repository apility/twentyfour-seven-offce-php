<?php

namespace Apility\TwentyfourSevenOffice\Soap;

use Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient;
use Apility\TwentyfourSevenOffice\Concerns\AuthenticatesSoapSession;

class CompanySoapClient extends TwentyfourSevenOfficeSoapClient
{
    use AuthenticatesSoapSession;

    /** @var string */
    protected string $endpoint = '/CRM/Company/V001/CompanyService.asmx?wsdl';
}
