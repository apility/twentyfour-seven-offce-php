<?php

namespace Apility\Office247\Contracts;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;
use Apility\Office247\Types\CompanySearchParameters;
use Apility\Office247\Types\Company;
use Apility\Office247\Types\GetCompaniesResponse;
use Apility\Office247\Types\SaveCompaniesResponse;

interface CompanyServiceContract extends SoapServiceContract
{
    /**
     * @param CompanySearchParameters|array $searchParameters
     * @param string[] $returnProperties
     * @return GetCompaniesResponse
     * @throws TwentyfourSevenOfficeException
     */
    public function GetCompanies($searchParameters = [], array $returnProperties = []): GetCompaniesResponse;

    /**
     * @param Company[]|array[] $companies
     * @return SaveCompaniesResponse
     * @throws TwentyfourSevenOfficeException
     */
    public function SaveCompanies($companies = []): SaveCompaniesResponse;
}
