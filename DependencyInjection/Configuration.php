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
                    ->end()
                ->end()
            ->end()
            ->children()
                ->arrayNode('index')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode("botones_arriba")
                            ->children()
                                ->arrayNode('nuevo')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('Nuevo')->end()
                                        ->scalarNode('icon')->defaultValue('fa fa-plus')->end()
                                        ->scalarNode('class')->defaultValue('btn btn-primary btn-sm')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('filtro')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('Buscar')->end()
                                        ->scalarNode('icon')->defaultValue('fa fa-filter')->end()
                                        ->scalarNode('class')->defaultValue('btn btn-primary btn-sm')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('paginador')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('')->end()
                                        ->scalarNode('icon')->defaultValue('')->end()
                                        ->scalarNode('class')->defaultValue('pagination pagination-sm')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode("botones_abajo")
                            ->children()
                                ->arrayNode('nuevo')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('Nuevo')->end()
                                        ->scalarNode('icon')->defaultValue('fa fa-plus')->end()
                                        ->scalarNode('class')->defaultValue('btn btn-primary btn-sm')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('filtro')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('Buscar')->end()
                                        ->scalarNode('icon')->defaultValue('fa fa-filter')->end()
                                        ->scalarNode('class')->defaultValue('btn btn-primary btn-sm')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('paginador')
                                    ->children()
                                        ->scalarNode('label')->defaultValue('')->end()
                                        ->scalarNode('icon')->defaultValue('')->end()
                                        ->scalarNode('class')->defaultValue('pagination pagination-sm')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
            ->end()
            ->children()
                ->arrayNode('new')
                ->end()
            ->end()
            ->children()
                ->arrayNode('show')
                ->end()
            ->end()
            ->children()
                ->arrayNode('edit')
                ->end()
            ->end()
        ->end();



        return $treeBuilder;
    }
}
