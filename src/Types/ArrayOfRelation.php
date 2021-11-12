<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\Relation;
use Apility\Office247\Types\SoapArray;

/**
 * @property Relation[] $Relation
 */
class ArrayOfRelation extends SoapArray
{
    protected $type = Relation::class;
}
