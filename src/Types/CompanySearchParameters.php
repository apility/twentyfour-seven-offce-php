<?php

namespace Apility\Office247\Types;

use DateTimeInterface;

use Apility\Office247\Types\SoapType;
use Apility\Office247\Concerns\HasSetters;
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
final class CompanySearchParameters extends SoapType implements Arrayable
{
    use HasSetters;
}
