<?php

namespace Apility\TwentyfourSevenOffice\Types\Company;

use DateTimeInterface;

use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;
use Apility\TwentyfourSevenOffice\Concerns\HasSetters;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @property string|null $ExternalId
 * @property int|null $CompanyId
 * @property int[]|null $CompanyIds
 * @property string|null $CompanyName
 * @property DateTimeInterface|null $ChangedAfter
 * @property string|null $CompanyEmail
 * @property string|null $CompanyPhone
 * @property string|null $OrganizationNumber
 */
final class CompanySearchParameters extends TwentyfourSevenOfficeType implements Arrayable
{
    use HasSetters;

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $mapped = [];

        foreach ($this->attributes as $key => $value) {
            $mapped[$key] = $this->__get($key);
        }

        return array_filter($mapped);
    }
}
