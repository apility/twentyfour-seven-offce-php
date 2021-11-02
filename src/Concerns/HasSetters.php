<?php

namespace Apility\TwentyfourSevenOffice\Concerns;

use Illuminate\Support\Str;

trait HasSetters
{
    final protected function __setterName($attribute)
    {
        return str_replace('_', '', 'set' . Str::camel($attribute) . 'Attribute');
    }

    final public function __set($key, $value)
    {
        $setter = $this->__setterName($key);

        if (method_exists($this, $setter)) {
            $this->{$setter}($value);
        } else {
            $this->attributes[$key] = $value;
        }
    }
}
