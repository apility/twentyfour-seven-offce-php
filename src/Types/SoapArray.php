<?php

namespace Apility\Office247\Types;

use ReflectionClass;
use Apility\Office247\Types\SoapType;

abstract class SoapArray extends SoapType
{
    /** @var string */
    protected $type;

    final public function __get($key)
    {
        $value = parent::__get($key);
        $reflection = new ReflectionClass($this->type);

        if (strtolower($reflection->getShortName()) === strtolower($key)) {
            $class = $this->type;
            return array_map(fn () => new $class($value), $value ?? []);
        }

        return $value;
    }

    final public function __debugInfo()
    {
        $__debugInfo = parent::__debugInfo();
        $reflection = new ReflectionClass($this->type);
        $__debugInfo[$reflection->getShortName()] = $this->__get($reflection->getShortName());
        return $__debugInfo;
    }
}
