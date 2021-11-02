<?php

namespace Apility\TwentyfourSevenOffice\Types;

use ArrayAccess;
use JsonSerializable;

use Apility\TwentyfourSevenOffice\Concerns\HasGetters;
use Apility\TwentyfourSevenOffice\Concerns\HasArrayAccess;

abstract class TwentyfourSevenOfficeType implements ArrayAccess, JsonSerializable
{
    use HasArrayAccess;
    use HasGetters;

    /** @var array */
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    final public function jsonSerialize()
    {
        return $this->attributes;
    }

    final public function __debugInfo()
    {
        return $this->attributes;
    }
}
