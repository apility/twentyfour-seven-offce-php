<?php

namespace Apility\Office247\Types;

final class DistributionMethod
{
    const Unchanged = 'Unchanged';
    const Print = 'Print';
    const EMail = 'EMail';
    const ElectronicInvoice = 'ElectronicInvoice';
    const Default = 'Default';

    public static function all()
    {
        return [
            self::Unchanged,
            self::Print,
            self::EMail,
            self::ElectronicInvoice,
            self::Default
        ];
    }
}
