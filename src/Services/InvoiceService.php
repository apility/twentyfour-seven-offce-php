<?php

namespace Apility\TwentyfourSevenOffice\Services;

use SoapFault;

use Illuminate\Contracts\Support\Arrayable;

use Apility\TwentyfourSevenOffice\Exceptions\TwentyfourSevenOfficeException;

use Apility\TwentyfourSevenOffice\Soap\InvoiceSoapClient;
use Apility\TwentyfourSevenOffice\Types\Company\CompanySearchParameters;
use Apility\TwentyfourSevenOffice\Types\Company;

class InvoiceService
{
    /** @var InvoiceSoapClient */
    protected $client;

    public function __construct(InvoiceSoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param Company|array $company
     * @return Company|null
     * @throws TwentyfourSevenOfficeException
     */
    public function saveInvoice($invoice)
    {
        $response = $this->saveInvoices([$invoice]);
        return array_shift($response);
    }


    /**
     * @param Company[]|array[] $companies
     * @return Company[]
     * @throws TwentyfourSevenOfficeException
     */
    public function saveInvoices($invoices = [])
    {
        $invoices = array_map(fn ($invoice) => ($invoice instanceof Arrayable) ? $invoice->toArray() : $invoice, $invoices);
        $response = $this->client->SaveInvoices(['invoices' => $invoices]);

        return array_map(fn ($invoice) => new Company((array) $invoice), (array) $response->SaveInvoicesResult);
    }
}
