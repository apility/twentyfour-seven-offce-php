<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\ArrayOfCompany;

/**
 * @property ArrayOfCompany $GetCompaniesResult
 */
class GetCompaniesResponse extends SoapType
{
    public function getGetCompaniesResultAttribute($result)
    {
        return new ArrayOfCompany($result);
    }
}
