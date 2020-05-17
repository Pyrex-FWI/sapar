<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 24/03/2019
 * Time: 23:02
 */

namespace Sapar\Console\ReleaseDispatcher\Config;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ReleaseDispatcherConfiguration
 */
class ReleaseDispatcherConfiguration implements ConfigurationInterface
{
    const CONF_KEY_RELEASE_DISPATCHER = 'release_dispatcher';
    const CONF_KEY_DISPATCHER = 'dispatcher';
    const CONF_KEY_FORMAT = 'target_format';
    const CONF_KEY_TARGET = 'target_path';
    const CONF_KEY_SOURCE = 'source_path';

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('conf');
        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode(self::CONF_KEY_RELEASE_DISPATCHER)
                ->children()
                    ->arrayNode(self::CONF_KEY_DISPATCHER)
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode(self::CONF_KEY_FORMAT)
                                ->cannotBeEmpty()
                                ->defaultValue('target~"/_"~release.getGroup()~"/"~release.getYear()~"/"~release.getName()')
                            ->end()
                            ->scalarNode(self::CONF_KEY_SOURCE)
                                ->isRequired()
                                ->cannotBeEmpty()

                                //->defaultValue(realpath(getcwd().DIRECTORY_SEPARATOR.'../../'))
                            ->end()
                            ->scalarNode(self::CONF_KEY_TARGET)
                                ->isRequired()
                                ->cannotBeEmpty()
                                //->defaultValue(realpath(getcwd().DIRECTORY_SEPARATOR.'../../'))
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
