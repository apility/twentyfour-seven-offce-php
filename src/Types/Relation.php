<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\SoapType;
use Apility\Office247\Types\PhoneNumbers;
use Apility\Office247\Types\EmailAddresses;

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
final class Relation extends SoapType
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
