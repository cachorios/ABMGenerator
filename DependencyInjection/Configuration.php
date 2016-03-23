<?php

namespace RBSoft\ABMGeneratorBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('abm_generator');

        $rootNode
            ->children()
            ->arrayNode('plantillas')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('layout_gral')->defaultValue('@ABMGenerator/layout.html.twig')->end()
                    ->scalarNode('block_content')->defaultValue('page_content')->end()
                    ->scalarNode('box_crud')->defaultValue('@ABMGenerator/box_crud.html.twig')->end()
                    ->scalarNode('box_modal')->defaultValue('@ABMGenerator/modal.html.twig')->end()
                    ->scalarNode('toolbar_pos')->defaultValue('both')->end() ## top, footer, both

                    ->arrayNode('btn_new')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('label')->defaultValue('Nuevo')->end()
                            ->scalarNode('icon')->defaultValue('fa fa-plus')->end()
                            ->scalarNode('class')->defaultValue('btn btn-primary btn-sm ')->end()
                        ->end()
                    ->end()

            ->end()


//            ->scalarNode('where_method')
//            ->defaultValue('and')
//            ->info('Defined the doctrine query builder method the bundle will use to add the entire filter condition.')
//            ->validate()
//            ->ifNotInArray(array(null, 'and', 'or'))
//            ->thenInvalid('Invalid value, please use "null", "and", "or".')
//            ->end()
//            ->end()

//            ->booleanNode('force_case_insensitivity')
//            ->info('Whether to do case insensitive LIKE comparisons.')
//            ->defaultNull()
//            ->end()
            ->end();

        return $treeBuilder;
    }
}
