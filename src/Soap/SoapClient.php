<?php

namespace Apility\Office247\Soap;

use SoapClient as BaseSoapClient;
use SoapFault;

use Apility\Office247\Concerns\BootableTraits;
use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;

use Apility\Office247\Contracts\SoapClientContract;

abstract class SoapClient extends BaseSoapClient implements SoapClientContract
{
    use BootableTraits;

    /** @var string */
    protected string $baseUri = 'https://api.24sevenoffice.com';

    /**
     * @var string
     */
    protected string $endpoint = '';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct($this->baseUri . $this->endpoint, [
            'trace' => true,
            'exceptions' => true,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
            'cache_wsdl' => WSDL_CACHE_BOTH,
        ]);

        $this->boot();
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed|void
     * @throws TwentyfourSevenOfficeException|SoapFault
     */
    public function __call($name, $arguments)
    {
        try {
            if ($result = parent::__call($name, $arguments)) {
                return json_decode(json_encode($result), true);
            }
        } catch (SoapFault $e) {
            throw TwentyfourSevenOfficeException::parse($e);
        }
    }
}
