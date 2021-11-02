<?php

namespace Apility\TwentyfourSevenOffice\Soap;

use Apility\TwentyfourSevenOffice\Exceptions\TwentyfourSevenOfficeException;
use ReflectionClass;
use SoapClient;
use SoapFault;

abstract class TwentyfourSevenOfficeSoapClient extends SoapClient
{
    /** @var string */
    protected string $baseUri = 'https://api.24sevenoffice.com';

    protected string $endpoint = '';

    public function __construct()
    {
        parent::__construct($this->baseUri . $this->endpoint, [
            'trace' => true,
            'exceptions' => true,
        ]);

        foreach (class_uses($this) as $trait) {
            $reflectionClass = new ReflectionClass($trait);
            $traitName = $reflectionClass->getShortName();

            if (method_exists($this, 'boot' . $traitName)) {
                call_user_func([$this, 'boot' . $traitName]);
            }
        }
    }

    public function __call($name, $arguments)
    {
        try {
            return parent::__call($name, $arguments);
        } catch (SoapFault $e) {
            throw TwentyfourSevenOfficeException::parse($e);
        }
    }
}
