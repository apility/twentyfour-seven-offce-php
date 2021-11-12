<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\Company;
use Apility\Office247\Types\SoapArray;

/**
 * @property Company[] $Company
 */
class ArrayOfCompany extends SoapArray
{
    protected $type = Company::class;
}
