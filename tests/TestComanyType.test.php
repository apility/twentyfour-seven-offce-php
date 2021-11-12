<?php

use Apility\Office247\Testing\TestCase;

use Apility\Office247\Types\Company;
use Apility\Office247\Types\Addresses;
use Apility\Office247\Types\ArrayOfCompanyMap;
use Apility\Office247\Types\ArrayOfRelation;
use Apility\Office247\Types\EmailAddresses;
use Apility\Office247\Types\PhoneNumbers;

final class TestCompanyType extends TestCase
{
    public function testCompanyTypeConstructor()
    {
        $company = new Company(['Name' => 'Test Company']);

        $this->assertEquals('Test Company', $company->Name);
        $this->assertEquals(['Name' => 'Test Company'], $company->toArray());
    }

    public function testCompanyTypeGetters()
    {
        $company = new Company();

        $this->assertInstanceOf(Addresses::class, $company->Addresses);
        $this->assertInstanceOf(PhoneNumbers::class, $company->PhoneNumbers);
        $this->assertInstanceOf(EmailAddresses::class, $company->EmailAddresses);
        $this->assertInstanceOf(DateTimeInterface::class, $company->IncorporationDate);
        $this->assertInstanceOf(DateTimeInterface::class, $company->DateCreated);
        $this->assertInstanceOf(DateTimeInterface::class, $company->DateChanged);
        $this->assertInstanceOf(ArrayOfRelation::class, $company->Relations);
        $this->assertInstanceOf(ArrayOfCompanyMap::class, $company->Maps);
    }
}
