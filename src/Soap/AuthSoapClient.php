<?php

namespace Apility\TwentyfourSevenOffice\Soap;

use Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient;

class AuthSoapClient extends TwentyfourSevenOfficeSoapClient
{
    /** @var string */
    protected string $endpoint = '/authenticate/v001/authenticate.asmx?wsdl';
}
