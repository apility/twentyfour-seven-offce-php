<?php

namespace Apility\Office247\Concerns;

use Apility\Office247\Concerns\HasSetters;

trait HasArrayAccess
{
    /**
     * @param string|int $offset
     * @return bool
     */
    final public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->attributes);
    }

    /**
     * @param string|int $offset
     * @return mixed
     */
    final public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * @param string|int $offset
     * @param mixed $value
     * @return void
     */
    final public function offsetSet($offset, $value)
    {
        if (!in_array(HasSetters::class, class_uses($this))) {
            // Type is immutable
            return;
        }

        $this->__set($offset, $value);
    }

    /**
     * @param string|int $offset
     * @return void
     */
    final public function offsetUnset($offset)
    {
        if (!in_array(HasSetters::class, class_uses($this))) {
            // Type is immutable
            return;
        }

        $this->__set($offset, null);
    }
}
