<?php

namespace Apility\TwentyfourSevenOffice\Types;

use Apility\TwentyfourSevenOffice\Exceptions\TwentyfourSevenOfficeException;
use Apility\TwentyfourSevenOffice\Types\Company\CompanyType;
use Apility\TwentyfourSevenOffice\Types\Company\Relation;
use Apility\TwentyfourSevenOffice\Types\Company\CompanyMap;
use Apility\TwentyfourSevenOffice\Types\Company\DistributionMethod;
use Apility\TwentyfourSevenOffice\Types\Company\CurrencyType;
use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;
use Apility\TwentyfourSevenOffice\Utilities\SoapArray;
use InvalidArgumentException;

/* <s:element minOccurs="0" maxOccurs="1" name="APIException" type="tns:APIException"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="Id" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="ExternalId" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="OrganizationNumber" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Name" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="FirstName" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="NickName" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" name="Addresses" type="tns:Addresses"/>
<s:element minOccurs="0" maxOccurs="1" name="PhoneNumbers" type="tns:PhoneNumbers"/>
<s:element minOccurs="0" maxOccurs="1" name="EmailAddresses" type="tns:EmailAddresses"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Url" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Country" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Note" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="InvoiceLanguage" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="None" name="Type" type="tns:CompanyType"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Username" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="Password" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="0001-01-01T00:00:00" name="IncorporationDate" type="s:dateTime"/>
<s:element minOccurs="0" maxOccurs="1" default="0001-01-01T00:00:00" name="DateCreated" type="s:dateTime"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="Status" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="PriceList" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="Owner" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="BankAccountNo" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="BankAccountType" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="BankAccountCountry" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="" name="BankAccountBic" type="s:string"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="TermsOfDeliveryId" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="0" name="AccountDebit" type="s:short"/>
<s:element minOccurs="0" maxOccurs="1" default="0" name="AccountCredit" type="s:short"/>
<s:element minOccurs="0" maxOccurs="1" default="0.0" name="Discount" type="s:decimal"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="TypeGroup" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="-79228162514264337593543950335" name="ShareCapital" type="s:decimal"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="NumberOfEmployees" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="-79228162514264337593543950335" name="Turnover" type="s:decimal"/>
<s:element minOccurs="0" maxOccurs="1" default="-79228162514264337593543950335" name="Profit" type="s:decimal"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="IndustryId" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="-2147483648" name="MemberNo" type="s:int"/>
<s:element minOccurs="0" maxOccurs="1" default="0001-01-01T00:00:00" name="DateChanged" type="s:dateTime"/>
<s:element minOccurs="0" maxOccurs="1" default="false" name="BlockInvoice" type="s:boolean"/> */

/**
 * @property Relations[] $Relations
 * @property CompanyMap[] $Maps
 * @property string $DistributionMethod
 * @property string $CurrencyId
 * @property int $PaymentTime
 * @property string $GlnNumber
 * @property bool $Factoring
 * @property int $LedgerCustomerAccount
 * @property int $LedgerSupplierAccount
 * @property string $VatNumber
 * @property bool $Private
 * @property bool $ExplicitlySpecifyNewCompanyId
 */
final class Company extends TwentyfourSevenOfficeType
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($e = $this->APIException) {
            throw TwentyfourSevenOfficeException::parse($e);
        }
    }

    public function getRelationsAttribute($relations)
    {
        if ($relations) {
            $relations = SoapArray::toArray($relations->Relation);
            return array_map(fn ($relation) => new Relation($relation), $relations ?? []);
        }

        return $relations;
    }

    public function getMapsAttribute($maps)
    {
        if ($maps) {
            $maps = SoapArray::toArray($maps->Map);

            return array_map(fn ($map) => new CompanyMap((array) $map), (array) $maps ?? []);
        }

        return [];
    }

    public function setTypeAttribute(string $type)
    {
        if (!in_array($type, CompanyType::all())) {
            throw new InvalidArgumentException("'" . $type . "'" . ' is not a valid value for CompanyType.');
        }

        $this->attributes['Type'] = $type;
    }

    public function setDistributionMethodAttribute(string $distributionMethod)
    {
        if (!in_array($distributionMethod, DistributionMethod::all())) {
            throw new InvalidArgumentException("'" . $distributionMethod . "'" . ' is not a valid value for DistributionMethod.');
        }

        $this->attributes['DistributionMethod'] = $distributionMethod;
    }

    public function setCurrencyIdAttribute(string $currencyId)
    {
        if (!in_array($currencyId, CurrencyType::all())) {
            throw new InvalidArgumentException("'" . $currencyId . "'" . ' is not a valid value for CurrencyId.');
        }

        $this->attributes['CurrencyId'] = $currencyId;
    }
}
