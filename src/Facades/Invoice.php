<?php

namespace Apility\Office247\Facades;

use Illuminate\Support\Facades\Facade;
use Apility\Office247\Contracts\InvoiceServiceContract;

/**
 * @method static \Apility\Office247\Types\SaveInvoicesResponse SaveInvoices(\Apility\Office247\Types\ArrayOfInvoiceOrder|array[])
 */
class Invoice extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return InvoiceServiceContract::class;
    }
}
