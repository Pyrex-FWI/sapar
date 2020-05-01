<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 25/03/2019
 * Time: 20:30
 */

namespace Sapar\Console\ReleaseDispatcher\Config;

use Sapar\Console\ReleaseDispatcher\Config\ReleaseDispatcherConfiguration as Conf;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Configuration
 */
final class Configuration
{
  public const CONFIG_FILE = '.release-dispatcher.yml';
  private static $_config;

    /**
     * @param $fromPathFile
     * @return array
     */
    public static function getConfig($fromPathFile)
    {
        if (self::$_config) {
            return self::$_config;
        }

        self::readConfiguration($fromPathFile);

        return self::$_config;
    }

    /**
     * @param $fromPathFile
     * @return array
     */
    public static function readConfiguration($fromPathFile)
    {
        $extraConfig = Yaml::parse(
            file_get_contents($fromPathFile)
        );

        $extraConfig   = [$extraConfig, []];
        $processor     = new Processor();
        $conf          = new Conf();
        self::$_config = $processor->processConfiguration($conf, $extraConfig)[ReleaseDispatcherConfiguration::CONF_KEY_RELEASE_DISPATCHER];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getDispatchTarget()
    {
        self::checkConfig();

        return self::$_config[ReleaseDispatcherConfiguration::CONF_KEY_DISPATCHER][ReleaseDispatcherConfiguration::CONF_KEY_TARGET];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getDispatchFormat()
    {
        self::checkConfig();

        return self::$_config[ReleaseDispatcherConfiguration::CONF_KEY_DISPATCHER][ReleaseDispatcherConfiguration::CONF_KEY_FORMAT];
    }

    /**
     * @throws \Exception
     */
    public static function checkConfig()
    : void
    {
        if (!self::$_config) {
            throw new \Exception(sprintf('You must call ::readConfiguration() before'));
        }
    }

  /**
   * @return string
   */
  public static function getCwdConfigFilePath(): string
  {
    $configFile = getcwd() . DIRECTORY_SEPARATOR . Configuration::CONFIG_FILE;

    return $configFile;
  }
}
