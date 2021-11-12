<?php

namespace Apility\Office247\Concerns;

use Apility\Office247\Facades\Auth;
use Apility\Office247\Soap\SoapClient;

trait AuthenticatesSoapSession
{
    /**
     * @return void
     */
    public function bootAuthenticatesSoapSession()
    {
        /** @var SoapClient $this */
        Auth::AuthenticateSoapClient($this);
    }
}
