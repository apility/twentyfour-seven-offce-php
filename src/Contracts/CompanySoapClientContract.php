<?php

namespace Apility\Office247\Contracts;

interface CompanySoapClientContract extends SoapClientContract
{
    public function GetCompanies(array $request): array;

    public function SaveCompanies(array $companies): array;
}
