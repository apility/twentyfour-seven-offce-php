<?php

namespace Apility\TwentyfourSevenOffice\Types\Company;

use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;
use Apility\TwentyfourSevenOffice\Types\Company\PhoneNumbers;
use Apility\TwentyfourSevenOffice\Types\Company\EmailAddresses;

/**
 * @property int $ContactId
 * @property int $CompanyId
 * @property string $FirstName
 * @property string $LastName
 * @property string $Role
 * @property int $RoleId
 * @property PhoneNumbers $PhoneNumbers
 * @property EmailAddresses $EmailAddresses
 * @property string $Fax
 */
final class Relation extends TwentyfourSevenOfficeType
{
    public function getPhoneNumbersAttribute($phoneNumbers = [])
    {
        return new PhoneNumbers((array) $phoneNumbers ?? []);
    }

    public function getEmailAddressesAttribute($emailAddresses = [])
    {
        return new EmailAddresses((array) $emailAddresses ?? []);
    }
}
