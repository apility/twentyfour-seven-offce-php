<?php

namespace Apility\TwentyfourSevenOffice\Utilities;

class SoapArray
{
    final static function toArray($data): array
    {
        if (is_object($data)) {
            return [json_decode(json_encode($data), true)];
        }

        return json_decode(json_encode($data), true);
    }
}
