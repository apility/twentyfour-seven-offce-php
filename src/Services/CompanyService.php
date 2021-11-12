<?php

namespace Apility\Office247\Services;

use Illuminate\Contracts\Support\Arrayable;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;

use Apility\Office247\Contracts\CompanySoapClientContract;
use Apility\Office247\Soap\CompanySoapClient;
use Apility\Office247\Types\CompanySearchParameters;
use Apility\Office247\Types\Company;
use Apility\Office247\Types\GetCompaniesResponse;

use Apility\Office247\Contracts\CompanyServiceContract;
use Apility\Office247\Contracts\SoapClientContract;

use Apility\Office247\Concerns\InteractsWithSoapClient;
use Apility\Office247\Types\SaveCompaniesResponse;

class CompanyService implements CompanyServiceContract
{
    use InteractsWithSoapClient;

    /** @var CompanySoapClientContract */
    protected $client;

    public function __construct(CompanySoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param CompanySearchParameters|array $searchParameters
     * @param string[] $returnProperties
     * @return GetCompaniesResponse
     * @throws TwentyfourSevenOfficeException
     */
    public function GetCompanies($searchParameters = [], array $returnProperties = ['Name', 'Id']): GetCompaniesResponse
    {
        $searchParameters = ($searchParameters instanceof Arrayable) ? $searchParameters->toArray() : $searchParameters;

        $response = $this->client->GetCompanies([
            'searchParams' => $searchParameters,
            'returnProperties' => $returnProperties,
        ]);

        return new GetCompaniesResponse($response);
    }

    /**
     * @param Company[]|array[] $companies
     * @return SaveCompaniesResponse
     * @throws TwentyfourSevenOfficeException
     */
    public function SaveCompanies($companies = []): SaveCompaniesResponse
    {
        $companies = array_map(fn ($company) => ($company instanceof Arrayable) ? $company->toArray() : $company, $companies);
        $response = $this->client->SaveCompanies(['companies' => $companies]);

        return new SaveCompaniesResponse($response);
    }

    public function setSoapClient(SoapClientContract $soapClient)
    {
        $this->client = $soapClient;
        return $this;
    }

    public function getSoapClient(): SoapClientContract
    {
        return $this->client;
    }
}
