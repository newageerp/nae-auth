<?php

namespace NaeSymfonyBundles\NaeAuthBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class NaeAuthExtension extends ConfigurableExtension
{
    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'nae_auth';
    }

    /**
     * {@inheritdoc}
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $listener = new Definition($mergedConfig['listener']['request_auth']);

        $listener->addTag('kernel.event_subscriber');

        $container->setDefinition('nae_auth.request_auth', $listener);
    }
}
