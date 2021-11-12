<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\ArrayOfCompany;

/**
 * @property ArrayOfCompany $SaveCompaniesResult
 */
class SaveCompaniesResponse extends SoapType
{
    public function getSaveCompaniesResultAttribute($result)
    {
        return new ArrayOfCompany($result);
    }
}
