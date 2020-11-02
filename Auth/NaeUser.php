<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Auth;

class NaeUser
{
    /**
     * @var int|null $id
     */
    protected $id;
    /**
     * @var string|null $sessionId
     */
    protected $sessionId;

    /**
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * @param string|null $sessionId
     */
    public function setSessionId(?string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}
