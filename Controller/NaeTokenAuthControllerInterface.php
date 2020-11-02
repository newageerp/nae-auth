<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Controller;

use NaeSymfonyBundles\NaeAuthBundle\Auth\NaeUser;

interface NaeTokenAuthControllerInterface
{
    /**
     * @param NaeUser|null $naeUser
     * @return void
     */
    public function setNaeUser(?NaeUser $naeUser): void;

    /**
     * @return NaeUser|null
     */
    public function getNaeUser(): ?NaeUser;
}
