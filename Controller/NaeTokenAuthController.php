<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Controller;


use NaeSymfonyBundles\NaeAuthBundle\Auth\NaeUser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class NaeTokenAuthController extends NaeBaseController implements NaeTokenAuthControllerInterface
{
    /**
     * @var NaeUser $naeUser
     */
    protected $naeUser;

    /**
     * @inheritDoc
     */
    public function getNaeUser(): ?NaeUser
    {
        return $this->naeUser;
    }

    /**
     * @inheritDoc
     */
    public function setNaeUser(?NaeUser $naeUser): void
    {
        $this->naeUser = $naeUser;
    }

    /**
     * @return Response
     */
    protected function noAuthError(): Response
    {
        return $this->returnError(0, 'Wrong token');
    }


}
