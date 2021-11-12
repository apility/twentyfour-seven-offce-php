<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\CompanyMap;
use Apility\Office247\Types\SoapArray;

/**
 * @property CompanyMap[] $CompanyMap
 */
class ArrayOfCompanyMap extends SoapArray
{
    protected $type = CompanyMap::class;
}
