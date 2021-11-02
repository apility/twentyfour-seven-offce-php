<?php

namespace Apility\TwentyfourSevenOffice\Concerns;

use Illuminate\Support\Str;

trait HasGetters
{
    final protected function __getterName($attribute)
    {
        return str_replace('_', '', 'get' . Str::camel($attribute) . 'Attribute');
    }

    final public function __get($key)
    {
        $value = $this->attributes[$key] ?? null;
        $getter = $this->__getterName($key);

        if (method_exists($this, $getter)) {
            $value = $this->{$getter}($value);
        }

        return $value;
    }
}
