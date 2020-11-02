<?php

namespace NaeSymfonyBundles\NaeAuthBundle;

use NaeSymfonyBundles\NaeAuthBundle\DependencyInjection\NaeAuthExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;


class NaeSymfonyBundlesNaeAuthBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new NaeAuthExtension();
    }
}
