<?php

namespace Apility\TwentyfourSevenOffice\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Apility\TwentyfourSevenOffice\Types\Company[] getCompanies(\Apility\TwentyfourSevenOffice\Types\Company\CompanySearchParameters|array $searchParameters, array $returnProperties)
 * @method static \Apility\TwentyfourSevenOffice\Types\Company saveCompany(\Apility\TwentyfourSevenOffice\Types\Company[]|array)
 * @method static \Apility\TwentyfourSevenOffice\Types\Company[] saveCompanies(\Apility\TwentyfourSevenOffice\Types\Company[]|array[])
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
        return 'twentyfoursevenoffice.company';
    }
}
