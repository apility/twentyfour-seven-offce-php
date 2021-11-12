<?php

namespace Apility\Office247\Services;

use Apility\Office247\Exceptions\AuthException;
use Apility\Office247\Exceptions\LoginException;

use Apility\Office247\Soap\AuthSoapClient;
use Apility\Office247\Types\GetIdentityResponse;
use Apility\Office247\Types\LoginResponse;
use Illuminate\Support\Facades\Cache;

use Apility\Office247\Contracts\AuthServiceContract;
use Apility\Office247\Contracts\AuthSoapClientContract;
use Apility\Office247\Contracts\SoapClientContract;

use Apility\Office247\Concerns\InteractsWithSoapClient;

class AuthService implements AuthServiceContract
{
    use InteractsWithSoapClient;

    /** @var string */
    protected $cookieName = 'ASP.NET_SessionId';

    /** @var AuthSoapClient */
    protected AuthSoapClientContract $client;

    /** @var array */
    protected array $credentials;

    /** @var LoginResponse|null */
    protected ?LoginResponse $loginResponse = null;

    /** @var array|null */
    protected ?array $identity = null;

    /**
     * @param array $credentials
     */
    public function __construct(array $credentials)
    {
        $this->client = new AuthSoapClient;

        $this->credentials = [
            'Username' => $credentials['username'] ?? null,
            'Password' => $credentials['password'] ?? null,
            'ApplicationId' => $credentials['application_id'] ?? null,
            'IdentityId' => $credentials['identity_id'] ?? null,
        ];

        $this->loginResponse = null;
    }

    /**
     * @return boolean
     */
    public function Authenticated(): bool
    {
        return $this->loginResponse !== null && $this->loginResponse->LoginResult;
    }

    /**
     * @throws LoginException
     * @return LoginResponse
     */
    public function Login(): LoginResponse
    {
        if (!$this->Authenticated()) {
            $this->loginResponse = new LoginResponse($this->client->Login(['credential' => $this->credentials]));

            if (!$this->loginResponse->LoginResult) {
                throw new LoginException('Login failed');
            }
        }

        $this->client->__setCookie($this->cookieName, $this->loginResponse->LoginResult);
        Cache::rememberForever('twentyfoursevenoffice.login_response', fn () => $this->loginResponse);

        return $this->loginResponse;
    }

    /**
     * Attempts to authenticate a session
     *
     * @param string|null $sessionId
     * @return bool
     */
    public function AuthenticateSession(?string $sessionId = null): bool
    {
        if ($sessionId) {
            $this->loginResponse = new LoginResponse(['LoginResult' => $sessionId]);
            $this->client->__setCookie($this->cookieName, $sessionId);

            try {
                $this->GetIdentity();
                return true;
            } catch (AuthException $e) {
                $this->loginResponse = null;
                $this->client->__setCookie($this->cookieName, '');
                Cache::forget('twentyfoursevenoffice.login_response');
            }
        }

        return false;
    }

    /**
     * @param SoapClientContract $client
     * @return SoapClientContract
     * @throws AuthException
     */
    public function AuthenticateSoapClient(SoapClientContract $client): SoapClientContract
    {
        if ($loginResponse = $this->Login()) {
            $client->__setCookie($this->cookieName, $loginResponse->LoginResult);
            return $client;
        }

        throw new AuthException;
    }

    /**
     * @return GetIdentityResponse
     */
    public function GetIdentity(): GetIdentityResponse
    {
        $this->Login();
        return new GetIdentityResponse($this->client->GetIdentity());
    }
}
