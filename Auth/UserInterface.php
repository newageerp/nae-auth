<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Auth;

interface UserInterface
{
    /**
     * @param string $salt
     */
    public function setSalt(string $salt): void;


    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     */
    public function setPassword(string $password): void;

    /**
     * @return int|null
     */
    public function getId(): ?int;

}
