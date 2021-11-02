<?php

namespace Apility\TwentyfourSevenOffice\Types\Auth;

use Apility\TwentyfourSevenOffice\Types\TwentyfourSevenOfficeType;

use Apility\TwentyfourSevenOffice\Types\Auth\User;
use Apility\TwentyfourSevenOffice\Types\Auth\Client;

/**
 * @property string $Id
 * @property User $User
 * @property Client $Client
 * @property bool $IsCurrent
 * @property bool $IsProtected
 * @property object $Servers
 */
final class IdentityResult extends TwentyfourSevenOfficeType
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
