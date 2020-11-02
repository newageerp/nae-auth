<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Service;

use Firebase\JWT\JWT;
use NaeSymfonyBundles\NaeAuthBundle\Auth\NaeUser;

class NaeAuthService
{
    /**
     * @var string $key
     */
    private $key;

    public function __construct()
    {
        $this->key = $_ENV['AUTH_KEY'];
    }

    /**
     * @param int $userId
     * @param string $sessionId
     * @return string
     */
    public function encrypt(int $userId, string $sessionId): string
    {
        return JWT::encode(['id' => $userId, 'sessionId' => $sessionId], $this->key);
    }

    /**
     * @param ?string $token
     * @return NaeUser|null
     */
    public function decrypt(?string $token): ?NaeUser
    {
        if (!$token) {
            return null;
        }
        $decoded = (array)JWT::decode($token, $this->key, array('HS256'));

        $userId = $decoded['id'];
        $sessionId = $decoded['sessionId'] ?? '';

        $naeUser = new NaeUser();
        $naeUser->setId($userId);
        $naeUser->setSessionId($sessionId);

        return $naeUser;
    }
}
