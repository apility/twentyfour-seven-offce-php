<?php

namespace Apility\Office247\Types;

use ArrayAccess;
use Serializable;
use JsonSerializable;
use DateTimeInterface;

use Illuminate\Contracts\Support\Arrayable;

use Apility\Office247\Concerns\HasGetters;
use Apility\Office247\Concerns\HasArrayAccess;
use Apility\Office247\Concerns\HasSetters;
use Apility\Office247\Exceptions\APIException;

/**
 * @property APIException|null $APIException
 */
abstract class SoapType implements Arrayable, ArrayAccess, Serializable, JsonSerializable
{
    use HasArrayAccess;
    use HasGetters;
    use HasSetters;

    /** @var array */
    protected $attributes = [];

    public function __construct(?array $attributes = [])
    {
        $this->attributes = $attributes ?? [];

        if ($e = $this->APIException) {
            throw $e;
        }
    }

    public function getAPIExceptionAttribute($e): ?APIException
    {
        if ($e) {
            return new APIException('[' . $e->Type . '] ' . $e->Message);
        }

        return null;
    }

    final public function jsonSerialize()
    {
        return $this->__debugInfo();
    }

    public function __debugInfo()
    {
        $__debugInfo = [];

        foreach (array_keys($this->attributes) as $key) {
            $__debugInfo[$key] = $this->__get($key);
        }

        return $__debugInfo;
    }

    public function serialize()
    {
        return serialize($this->attributes);
    }

    public function unserialize($data)
    {
        $this->attributes = unserialize($data);
    }

    public function toArray()
    {
        $mapped = [];

        foreach ($this->attributes as $key => $value) {
            $value = $this->__get($key);
            if ($value instanceof DateTimeInterface) {
                $value = $value->format('c');
            }

            $mapped[$key] = $value;
        }

        return $mapped;
    }
}
