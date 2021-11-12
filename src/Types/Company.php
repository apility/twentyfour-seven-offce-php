<?php

namespace Apility\Office247\Types;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;
use Apility\Office247\Types\CompanyType;
use Apility\Office247\Types\ArrayOfRelation;
use Apility\Office247\Types\PhoneNumbers;
use Apility\Office247\Types\EmailAddresses;
use Apility\Office247\Types\CompanyMap;
use Apility\Office247\Types\DistributionMethod;
use Apility\Office247\Types\CurrencyType;
use Apility\Office247\Types\SoapType;
use Apility\Office247\Utilities\SoapArray;
use Carbon\Carbon;
use DateTimeInterface;
use InvalidArgumentException;

/**
 * @property int $Id
 * @property string $ExternalId
 * @property string $OrganizationNumber
 * @property mixed $Name
 * @property string $Firstname
 * @property string $Nickname
 * @property Addresses $Addresses
 * @property PhoneNumbers $PhoneNumbers
 * @property EmailAddresses $EmailAddresses
 * @property string $Url
 * @property string $Country
 * @property string $Note
 * @property string $InvoiceLanguage
 * @property string $CompanyType
 * @property string $Username
 * @property string $Password
 * @property DateTimeInterface $IncorporationDate
 * @property DateTimeInterface $DateCreated
 * @property int $Status
 * @property int $PriceList
 * @property int $Owner
 * @property string $BankAccountNo
 * @property string $BankAccountType
 * @property string $BankAccountCountry
 * @property string $BankAccountBic
 * @property int $TermsOfDeliveryId
 * @property int $AccountDebit
 * @property int $AccountCredit
 * @property float $Discount
 * @property int $TypeGroup
 * @property float $ShareCapital
 * @property int $NumberOfEmployees
 * @property float $Turnover
 * @property float $Profit
 * @property int $IndustryId
 * @property int $MemberNo
 * @property DateTimeInterface $DateChanged
 * @property bool $BlockInvoice
 * @property ArrayOfRelation $Relations
 * @property ArrayOfCompanyMap[] $Maps
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
final class Company extends SoapType
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($e = $this->APIException) {
            throw TwentyfourSevenOfficeException::parse($e);
        }
    }

    public function getAddressesAttribute($Addresses)
    {
        return new Addresses((array) $Addresses ?? []);
    }

    public function getPhoneNumbersAttribute($phoneNumbers)
    {
        return new PhoneNumbers((array) $phoneNumbers ?? []);
    }

    public function getEmailAddressesAttribute($emailAddresses)
    {
        return new EmailAddresses((array) $emailAddresses ?? []);
    }

    public function getIncorporationDateAttribute($incorporationDate)
    {
        return Carbon::parse($incorporationDate);
    }

    public function getDateCreatedAttribute($dateCreated)
    {
        return Carbon::parse($dateCreated);
    }

    public function getDateChangedAttribute($dateChanged)
    {
        return Carbon::parse($dateChanged);
    }

    public function getRelationsAttribute($relations)
    {
        return new ArrayOfRelation($relations);
    }

    public function getMapsAttribute($maps)
    {
        return new ArrayOfCompanyMap($maps);
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
