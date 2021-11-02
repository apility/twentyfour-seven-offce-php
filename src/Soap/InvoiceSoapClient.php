<?php

namespace Apility\TwentyfourSevenOffice\Soap;

use Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient;
use Apility\TwentyfourSevenOffice\Concerns\AuthenticatesSoapSession;

class InvoiceSoapClient extends TwentyfourSevenOfficeSoapClient
{
    use AuthenticatesSoapSession;

    /** @var string */
    protected string $endpoint = '/Economy/InvoiceOrder/V001/InvoiceService.asmx?wsdl';
}
