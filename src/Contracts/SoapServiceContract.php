<?php

namespace Apility\Office247\Contracts;

use Apility\Office247\Contracts\SoapClientContract;

interface SoapServiceContract extends ServiceContract
{
    /**
     * @param SoapClientContract $client
     * @return static
     */
    public function setSoapClient(SoapClientContract $soapClient);

    public function getSoapClient(): SoapClientContract;
}
