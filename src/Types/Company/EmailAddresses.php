<?php

namespace Apility\TwentyfourSevenOffice\Types\Company;

use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;
use Apility\TwentyfourSevenOffice\Types\Company\EmailAddress;

/**
 * @property EmailAddress $Home
 * @property EmailAddress $Invoice
 * @property EmailAddress $Primary
 * @property EmailAddress $Work
 * @property EmailAddress $Alternative
 */
final class EmailAddresses extends TwentyfourSevenOfficeType
{
    public function getHomeAttribute($home = [])
    {
        return new EmailAddress((array) $home ?? []);
    }

    public function getInvoiceAttribute($invoice = [])
    {
        return new EmailAddress((array) $invoice ?? []);
    }

    public function getPrimaryAttribute($primary = [])
    {
        return new EmailAddress((array) $primary ?? []);
    }

    public function getWorkAttribute($work = [])
    {
        return new EmailAddress((array) $work ?? []);
    }

    public function getAlternativeAttribute($alternative = [])
    {
        return new EmailAddress((array) $alternative ?? []);
    }
}
