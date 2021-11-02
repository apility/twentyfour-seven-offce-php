<?php

namespace Apility\TwentyfourSevenOffice\Exceptions;

use Exception;
use SoapFault;

use Illuminate\Support\Str;

abstract class TwentyfourSevenOfficeException extends Exception
{
    /**
     * @param SoapFault|object $e
     * @return static|SoapFault
     */
    public static function parse($e)
    {
        if ($e instanceof SoapFault) {
            $message = $e->getMessage();
            $parts = explode('--->', $message);
            $message = array_pop($parts);

            if (Str::contains(Str::lower($message), Str::lower('Session is not authenticated'))) {
                return new AuthException($message);
            }

            if (Str::contains(Str::lower($message), Str::lower('Instance validation error'))) {
                throw new InstanceValidationException($message);
            }

            if (Str::contains(Str::lower($message), Str::lower('Please specify at least one search parameter'))) {
                return new CompanySearchException($message);
            }

            return $e;
        }

        if (is_object($e) && isset($e->Type)) {
            switch ($e->Type) {
                case 'Office24Seven.Library.Core.ParameterNotFoundException':
                    return new ParameterNotFoundException($e->Message);
                default:
                    $message = $e->Message;
                    break;
            }
        }

        return new UnknownException($message);
    }
}
