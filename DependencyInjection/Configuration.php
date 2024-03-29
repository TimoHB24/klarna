<?php

namespace Wk\KlarnaApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder
            ->root('wk_klarna_api')
            ->children()
                ->scalarNode('merchant_id')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('secret')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->integerNode('country')
                    ->isRequired()
                    ->min(0)
                ->end()
                ->integerNode('language')
                    ->isRequired()
                    ->min(0)
                ->end()
                ->integerNode('currency')
                    ->isRequired()
                    ->min(0)
                ->end()
                ->integerNode('use_sandbox')
                    ->isRequired()
                    ->min(0)
                    ->max(1)
                ->end()
            ->end()
        ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
