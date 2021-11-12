<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\Identity;

/**
 * @property Identity $GetIdentityResult
 */
class GetIdentityResponse extends SoapType
{
    public function getGetIdentityResultAttribute($result)
    {
        return new Identity($result);
    }
}
