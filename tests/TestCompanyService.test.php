<?php

use Apility\Office247\Testing\TestCase;

use Apility\Office247\Facades\Company;
use Apility\Office247\Contracts\CompanyServiceContract;
use Apility\Office247\Testing\Soap\CompanySoapClient;
use Apility\Office247\Types\ArrayOfCompany;
use Apility\Office247\Types\GetCompaniesResponse;

use Apility\Office247\Types\Company as CompanyType;
use Apility\Office247\Types\SaveCompaniesResponse;

final class TestCompanyService extends TestCase
{
    public function testCompanyFacade()
    {
        /** @var CompanyServiceContract $instance */
        $instance = Company::getFacadeRoot();

        $this->assertInstanceOf(CompanyServiceContract::class, $instance);
    }

    public function testGetCompanies()
    {
        /** @var ComapnySoapClient $client */
        $client = Company::getSoapClient();

        $client->queue('GetCompanies', [
            'GetCompaniesResult' => [
                'Company' => [
                    [
                        'Id' => 1,
                        'Name' => 'Acme Incorporated',
                        'LedgerCustomerAccount' => 0,
                        'LedgerSupplierAccount' => 0,
                    ],
                ],
            ]
        ]);

        $response = Company::GetCompanies([], []);
        $this->assertInstanceOf(GetCompaniesResponse::class, $response);

        $companyArray = $response->GetCompaniesResult;
        $this->assertInstanceOf(ArrayOfCompany::class, $companyArray);

        $companies = $companyArray->Company;
        $this->assertIsArray($companies);
        $this->assertCount(1, $companies);

        $company = array_pop($companies);
        $this->assertInstanceOf(CompanyType::class, $company);
    }

    public function testSaveCompanies()
    {
        /** @var ComapnySoapClient $client */
        $client = Company::getSoapClient();

        $client->queue('SaveCompanies', [
            'SaveCompaniesResult' => [
                'Company' => [
                    [
                        'Id' => 1,
                        'Name' => 'Acme Incorporated',
                        'LedgerCustomerAccount' => 0,
                        'LedgerSupplierAccount' => 0,
                    ],
                ]
            ]
        ]);

        $company = new CompanyType([
            'Name' => 'Acme Incorporated',
        ]);

        $response = Company::SaveCompanies([$company]);

        $this->assertInstanceOf(SaveCompaniesResponse::class, $response);
        $companyArray = $response->SaveCompaniesResult;

        $this->assertInstanceOf(ArrayOfCompany::class, $companyArray);

        $companies = $companyArray->Company;
        $this->assertIsArray($companies);
        $this->assertCount(1, $companies);

        $company = array_pop($companies);
        $this->assertInstanceOf(CompanyType::class, $company);
    }
}
