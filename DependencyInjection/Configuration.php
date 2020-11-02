<?php

namespace NaeSymfonyBundles\NaeAuthBundle\DependencyInjection;

use NaeSymfonyBundles\NaeAuthBundle\EventSubscriber\NaeTokenSubscriber;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder('nae_auth');

        $rootNode = $builder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('listener')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('request_auth')
                        ->defaultValue(NaeTokenSubscriber::class)
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}
