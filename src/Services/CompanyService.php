<?php

namespace Apility\TwentyfourSevenOffice\Services;

use SoapFault;

use Illuminate\Contracts\Support\Arrayable;

use Apility\TwentyfourSevenOffice\Exceptions\TwentyfourSevenOfficeException;

use Apility\TwentyfourSevenOffice\Soap\CompanySoapClient;
use Apility\TwentyfourSevenOffice\Types\Company\CompanySearchParameters;
use Apility\TwentyfourSevenOffice\Types\Company;

class CompanyService
{
    /** @var CompanySoapClient */
    protected $client;

    public function __construct(CompanySoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param CompanySearchParameters|array $searchParameters
     * @param string[] $returnProperties
     * @return Company[]
     * @throws TwentyfourSevenOfficeException
     */
    public function getCompanies($searchParameters = [], $returnProperties = ['Name', 'Id'])
    {
        $searchParameters = ($searchParameters instanceof Arrayable) ? $searchParameters->toArray() : $searchParameters;

        $response = $this->client->GetCompanies([
            'searchParams' => $searchParameters,
            'returnProperties' => $returnProperties,
        ]);

        if (is_array($response->GetCompaniesResult)) {
            return array_map(fn ($company) => new Company((array) $company->Company), (array) $response->GetCompaniesResult);
        }

        return [new Company((array) $response->GetCompaniesResult->Company)];
    }

    /**
     * @param Company|array $company
     * @return Company|null
     * @throws TwentyfourSevenOfficeException
     */
    public function saveCompany($company)
    {
        $response = $this->saveCompanies([$company]);
        return array_shift($response);
    }

    /**
     * @param Company[]|array[] $companies
     * @return Company[]
     * @throws TwentyfourSevenOfficeException
     */
    public function saveCompanies($companies = [])
    {
        $companies = array_map(fn ($company) => ($company instanceof Arrayable) ? $company->toArray() : $company, $companies);
        $response = $this->client->SaveCompanies(['companies' => $companies]);

        return array_map(fn ($company) => new Company((array) $company), (array) $response->SaveCompaniesResult);
    }
}
