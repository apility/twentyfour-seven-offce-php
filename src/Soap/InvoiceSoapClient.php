<?php

namespace Apility\Office247\Soap;

use Apility\Office247\Soap\SoapClient;
use Apility\Office247\Concerns\AuthenticatesSoapSession;

class InvoiceSoapClient extends SoapClient
{
    use AuthenticatesSoapSession;

    /** @var string */
    protected string $endpoint = '/Economy/InvoiceOrder/V001/InvoiceService.asmx?wsdl';
}
