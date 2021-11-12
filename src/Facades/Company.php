<?php

namespace Apility\Office247\Facades;

use Illuminate\Support\Facades\Facade;
use Apility\Office247\Contracts\CompanyServiceContract;

/**
 * @method static \Apility\Office247\Types\GetCompaniesResponse GetCompanies(\Apility\Office247\Types\CompanySearchParameters|array $searchParameters, array $returnProperties)
 * @method static \Apility\Office247\Types\SaveCompaniesResponse SaveCompanies(\Apility\Office247\Types\Company[]|array[])
 */
class Company extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CompanyServiceContract::class;
    }
}
