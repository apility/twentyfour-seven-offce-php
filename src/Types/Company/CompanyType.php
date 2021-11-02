<?php

namespace Apility\TwentyfourSevenOffice\Types\Company;

final class CompanyType
{
    const None = 'None';
    const Lead = 'Lead';
    const Consumer = 'Consumer';
    const Business = 'Business';
    const Supplier = 'Supplier';

    public static function all()
    {
        return [
            static::None,
            static::Lead,
            static::Consumer,
            static::Business,
            static::Supplier
        ];
    }
}
