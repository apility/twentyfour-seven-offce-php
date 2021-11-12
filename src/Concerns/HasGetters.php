<?php

namespace Apility\Office247\Concerns;

use Illuminate\Support\Str;

trait HasGetters
{
    /**
     * @param string $attribute
     * @return string
     */
    final protected function __getterName($attribute)
    {
        return str_replace('_', '', 'get' . Str::camel($attribute) . 'Attribute');
    }

    final protected function hasGetter($key)
    {
        $getter = $this->__getterName($key);

        if (method_exists($this, $getter)) {
            return true;
        }

        return false;
    }

    final protected function invokeGetter($key, $value)
    {
        $value = $this->attributes[$key] ?? null;
        $getter = $this->__getterName($key);

        if ($this->hasGetter($key)) {
            return $this->{$getter}($value);
        }

        return $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $value = $this->attributes[$key] ?? null;
        $value = $value ?? $this->attributes[ucfirst($key)] ?? null;

        return $this->invokeGetter($key, $value);
    }
}
