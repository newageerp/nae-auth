<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Auth;

use Doctrine\ORM\Mapping as ORM;

abstract class UserAbstract implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $email
     * @ORM\Column(type="string")
     */
    protected $email;
    /**
     * @var string $password
     * @ORM\Column(type="string")
     */
    protected $password;
    /**
     * @var string $salt
     * @ORM\Column(type="string")
     */
    protected $salt;

    /**
     * @param string $salt
     */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
