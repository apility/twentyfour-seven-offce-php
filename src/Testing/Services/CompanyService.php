<?php

namespace Apility\Office247\Testing\Services;

use Apility\Office247\Services\CompanyService as Service;
use Apility\Office247\Testing\Soap\CompanySoapClient;

class CompanyService extends Service
{
    public function __construct()
    {
        $this->client = new CompanySoapClient();
    }
}
