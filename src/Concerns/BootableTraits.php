<?php

namespace Apility\Office247\Concerns;

use ReflectionClass;

trait BootableTraits
{
    /**
     * @return void
     */
    protected function boot()
    {
        foreach (class_uses($this) as $trait) {
            $reflectionClass = new ReflectionClass($trait);
            $traitName = $reflectionClass->getShortName();

            if (method_exists($this, 'boot' . $traitName)) {
                call_user_func([$this, 'boot' . $traitName]);
            }
        }
    }
}
