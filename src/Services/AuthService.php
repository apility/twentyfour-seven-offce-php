<?php

namespace Apility\TwentyfourSevenOffice\Services;

use Apility\TwentyfourSevenOffice\Exceptions\AuthException;
use Apility\TwentyfourSevenOffice\Exceptions\LoginException;

use Apility\TwentyfourSevenOffice\Soap\AuthSoapClient;
use Apility\TwentyfourSevenOffice\Soap\TwentyfourSevenOfficeSoapClient;

use Illuminate\Support\Facades\Cache;

class AuthService
{
    /** @var string */
    protected $cookieName = 'ASP.NET_SessionId';

    /** @var AuthSoapClient */
    protected AuthSoapClient $client;

    /** @var array */
    protected array $credentials;

    /** @var string|null */
    protected ?string $sessionId = null;

    /** @var array|null */
    protected ?array $identity = null;

    /**
     * Undocumented function
     *
     * @param array $credentials
     * @param string|null $sessionId
     */
    public function __construct(array $credentials, ?string $sessionId = null)
    {
        $this->client = new AuthSoapClient;

        $this->credentials = [
            'Username' => $credentials['username'] ?? null,
            'Password' => $credentials['password'] ?? null,
            'ApplicationId' => $credentials['application_id'] ?? null,
            'IdentityId' => $credentials['identity_id'] ?? null,
        ];

        $this->sessionId = $sessionId;
    }

    /**
     * @return boolean
     */
    protected function authenticated(): bool
    {
        return $this->sessionId !== null;
    }

    /**
     * @throws LoginException
     * @return AuthSoapClient
     */
    protected function login(): AuthSoapClient
    {
        if (!$this->authenticated()) {
            $response = $this->client->Login(['credential' => $this->credentials]);
            $this->sessionId = $response->LoginResult;

            if (!$this->sessionId) {
                throw new LoginException('Login failed');
            }
        }

        $this->client->__setCookie($this->cookieName, $this->sessionId);
        Cache::rememberForever('twentyfoursevenoffice.session_id', fn () => $this->sessionId);

        return $this->client;
    }

    /**
     * Attempts to authenticate a session
     *
     * @param string|null $sessionId
     * @return bool
     */
    public function authenticateSession(?string $sessionId): bool
    {
        if ($sessionId) {
            $this->sessionId = $sessionId;
            $this->client->__setCookie($this->cookieName, $this->sessionId);

            try {
                $this->identity();
                return true;
            } catch (AuthException $e) {
                $this->sessionId = null;
                $this->client->__setCookie($this->cookieName, '');
                Cache::forget('twentyfoursevenoffice.session_id');
            }
        }

        return false;
    }

    /**
     * @param TwentyfourSevenOfficeSoapClient $client
     * @return TwentyfourSevenOfficeSoapClient
     */
    public function authenticateSoapClient(TwentyfourSevenOfficeSoapClient $client)
    {
        $this->login();
        $client->__setCookie($this->cookieName, $this->sessionId);
        return $client;
    }

    /**
     * @return IdentityResult
     */
    public function identity()
    {
        return $this->login()->GetIdentity()->GetIdentityResult;
    }
}
