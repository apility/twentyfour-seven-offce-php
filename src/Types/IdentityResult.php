<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\SoapType;

use Apility\Office247\Types\User;
use Apility\Office247\Types\Client;

/**
 * @property string $Id
 * @property User $User
 * @property Client $Client
 * @property bool $IsCurrent
 * @property bool $IsProtected
 * @property object $Servers
 */
final class GetIdentityResult extends SoapType
{
    /**
     * @param mixed $user
     * @return User
     */
    protected function getUserAttribute($user): User
    {
        return new User($user);
    }

    /**
     * @param mixed $client
     * @return Client
     */
    protected function getClientAttribute($client): Client
    {
        return new Client($client);
    }
}
