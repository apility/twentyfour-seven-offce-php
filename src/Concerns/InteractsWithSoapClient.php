<?php

namespace Apility\Office247\Concerns;

use Apility\Office247\Contracts\SoapClientContract;

trait InteractsWithSoapClient
{
    public function setSoapClient(SoapClientContract $soapClient)
    {
        $this->client = $soapClient;
        return $this;
    }

    public function getSoapClient(): SoapClientContract
    {
        return $this->client;
    }
}
