<?php

use PHPUnit\Framework\TestCase;

use Apility\Office247\Types\CompanySearchParameters;
use Carbon\Carbon;

final class TestCompanySearchParameters extends TestCase
{
    public function testSerialization()
    {
        $date = Carbon::parse('2020-01-01');

        $companySearchParameters = new CompanySearchParameters();
        $companySearchParameters->ExternalId = '123';
        $companySearchParameters->CompanyId = 123;
        $companySearchParameters->CompanyIds = [123, 456];
        $companySearchParameters->CompanyName = 'Test';
        $companySearchParameters->ChangedAfter = $date;
        $companySearchParameters->CompanyEmail = 'test@example.com';
        $companySearchParameters->CompanyPhone = '+0112345678';
        $companySearchParameters->OrganizationNumber = '1234567890';

        $expected = [
            'ExternalId' => '123',
            'CompanyId' => 123,
            'CompanyIds' => [123, 456],
            'CompanyName' => 'Test',
            'ChangedAfter' => $date->format('c'),
            'CompanyEmail' => 'test@example.com',
            'CompanyPhone' => '+0112345678',
            'OrganizationNumber' => '1234567890',
        ];

        $this->assertEquals($expected, $companySearchParameters->toArray());
        $this->assertEquals($expected, (new CompanySearchParameters($expected))->toArray());
    }
}
