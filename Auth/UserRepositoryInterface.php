<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Auth;

interface UserRepositoryInterface
{
    /**
     * @param NaeUser $user
     * @return mixed
     */
    public function userFromNaeUser(NaeUser $user);
}
