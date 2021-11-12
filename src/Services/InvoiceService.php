<?php

namespace Apility\Office247\Services;

use Illuminate\Contracts\Support\Arrayable;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;

use Apility\Office247\Soap\InvoiceSoapClient;
use Apility\Office247\Types\Company;

use Apility\Office247\Contracts\InvoiceServiceContract;

use Apility\Office247\Concerns\InteractsWithSoapClient;

class InvoiceService implements InvoiceServiceContract
{
    use InteractsWithSoapClient;

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
    public function saveInvoice($invoice): ?Company
    {
        $response = $this->saveInvoices([$invoice]);
        return array_shift($response);
    }


    /**
     * @param Company[]|array[] $companies
     * @return Company[]
     * @throws TwentyfourSevenOfficeException
     */
    public function saveInvoices($invoices = []): array
    {
        $invoices = array_map(fn ($invoice) => ($invoice instanceof Arrayable) ? $invoice->toArray() : $invoice, $invoices);
        $response = $this->client->SaveInvoices(['invoices' => $invoices]);

        return array_map(fn ($invoice) => new Company((array) $invoice), (array) $response->SaveInvoicesResult);
    }
}
