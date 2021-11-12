<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\SoapArray;
use Apility\Office247\Types\InvoiceOrder;

/**
 * @property InvoiceOrder[] $InvoiceOrder
 */
class ArrayOfInvoiceOrder extends SoapArray
{
    protected $type = InvoiceOrder::class;
}
