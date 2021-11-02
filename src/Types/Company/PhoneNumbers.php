<?php

namespace Apility\TwentyfourSevenOffice\Types\Company;

use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;
use Apility\TwentyfourSevenOffice\Types\Company\PhoneNumber;

/**
 * @property PhoneNumber $Home
 * @property PhoneNumber $Fax
 * @property PhoneNumber $Mobile
 * @property PhoneNumber $Primary
 * @property PhoneNumber $Work
 */
final class PhoneNumbers extends TwentyfourSevenOfficeType
{
    public function getHomeAttribute($home = [])
    {
        return new PhoneNumber((array) $home ?? []);
    }

    public function getFaxAttribute($fax = [])
    {
        return new PhoneNumber((array) $fax ?? []);
    }

    public function getMobileAttribute($mobile = [])
    {
        return new PhoneNumber((array) $mobile ?? []);
    }

    public function getPrimaryAttribute($primary = [])
    {
        return new PhoneNumber((array) $primary ?? []);
    }

    public function getWorkAttribute($work = [])
    {
        return new PhoneNumber((array) $work ?? []);
    }
}
