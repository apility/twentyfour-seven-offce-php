<?php

namespace Apility\TwentyfourSevenOffice\Concerns;

use Apility\TwentyfourSevenOffice\Concerns\HasSetters;

trait HasArrayAccess
{
    final public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->attributes);
    }

    final public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    final public function offsetSet($offset, $value)
    {
        if (!in_array(HasSetters::class, class_uses($this))) {
            // Type is immutable
            return;
        }

        $this->__set($offset, $value);
    }

    final public function offsetUnset($offset)
    {
        if (!in_array(HasSetters::class, class_uses($this))) {
            // Type is immutable
            return;
        }

        $this->__set($offset, null);
    }
}
