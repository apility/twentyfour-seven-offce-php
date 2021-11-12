<?php

namespace Apility\Office247\Concerns;

use Illuminate\Support\Str;

trait HasSetters
{
    /**
     * @param string $attribute
     * @return string
     */
    final protected function __setterName($attribute)
    {
        return str_replace('_', '', 'set' . Str::camel($attribute) . 'Attribute');
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
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
