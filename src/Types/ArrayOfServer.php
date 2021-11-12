<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\Server;
use Apility\Office247\Types\SoapArray;

/**
 * @property Server[] $Server
 */
class ArrayOfServer extends SoapArray
{
    protected $type = Server::class;
}
