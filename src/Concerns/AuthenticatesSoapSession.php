<?php

namespace Apility\TwentyfourSevenOffice\Concerns;

use Apility\TwentyfourSevenOffice\Facades\Auth;
use Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient;

trait AuthenticatesSoapSession
{
    public function bootAuthenticatesSoapSession()
    {
        /** @var TwentyfourSevenOfficeSoapClient $this */
        Auth::authenticateSoapClient($this);
    }
}
