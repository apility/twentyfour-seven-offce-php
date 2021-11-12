<?php

namespace Apility\Office247\Contracts;

use Apility\Office247\Types\Company;

interface InvoiceServiceContract extends SoapServiceContract
{
    /**
     * @param Company[]|array[] $companies
     * @return Company[]
     * @throws TwentyfourSevenOfficeException
     */
    public function SaveInvoices($invoices = []): array;
}
