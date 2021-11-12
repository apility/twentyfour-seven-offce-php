<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\User;
use Apility\Office247\Types\Client;
use Apility\Office247\Types\ArrayOfServer;

/**
 * @property string $Id
 * @property User $User
 * @property Client $Client
 * @property bool $IsCurrent
 * @property bool $IsDefault
 * @property bool $IsProtected
 * @property ArrayOfServer $Servers
 * @property bool $IsDisabled
 */
class Identity extends SoapType
{
    public function getUserAttribute($user)
    {
        return new User($user);
    }

    public function getClientAttribute($client)
    {
        return new Client($client);
    }

    public function getServersAttribute($servers)
    {
        return new ArrayOfServer($servers);
    }
}
