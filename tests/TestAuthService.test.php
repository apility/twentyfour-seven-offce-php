<?php

use Apility\Office247\Contracts\AuthServiceContract;
use Apility\Office247\Testing\TestCase;

use Apility\Office247\Facades\Auth;
use Apility\Office247\Testing\Services\AuthService;
use Apility\Office247\Testing\Soap\AuthSoapClient;
use Apility\Office247\Types\GetIdentityResponse;

final class TestAuthService extends TestCase
{
    public function testAuthFacade()
    {
        /** @var AuthServiceContract $instance */
        $instance = Auth::getFacadeRoot();

        $this->assertInstanceOf(AuthServiceContract::class, $instance);
    }

    public function testGetIdentity()
    {
        /** @var AuthService $instance */
        $instance = Auth::getFacadeRoot();

        /** @var AuthSoapClient */
        $client = $instance->getSoapClient();

        $loginResult = [
            'LoginResult' => 'abcdefghijklmnopqrstuvwx'
        ];

        $getIdentityResult = [
            'GetIdentityResult' => [
                'Id' => '00000000-0000-0000-0000-000000000000',
                'User' => [
                    'ContactId' => 1,
                    'Id' => '00000000-0000-0000-0000-000000000000',
                    'Name' => 'John Doe',
                    'EmployeeId' => 1,
                ],
                'Client' => [
                    'Id' => 1,
                    'Name' => 'Acme Corporation',
                ],
                'IsCurrent' => true,
                'IsDefault' => false,
                'IsProtected' => false,
                'Servers' => []
            ]
        ];

        $client->queue('Login', $loginResult);
        $client->queue('GetIdentity', $getIdentityResult);

        $expected = new GetIdentityResponse($getIdentityResult);

        $this->assertEquals($expected, $instance->GetIdentity());
    }
}
