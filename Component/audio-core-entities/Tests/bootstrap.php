<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests;

require_once 'autoload.php';

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Logging\SQLLogger;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Doctrine\ORM\Tools\Setup;
use Gedmo\Sluggable\SluggableListener;
use Gedmo\Timestampable\TimestampableListener;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Bridge\Doctrine\Logger\DbalLogger;
use Symfony\Component\Yaml\Parser;

class bootstrap
{
    /**
     * @return array|mixed|\stdClass|\Symfony\Component\Yaml\Tag\TaggedValue|null
     */
    public static function getConf()
    {
        $yaml = new Parser();

        $yamlString = file_get_contents(__DIR__.\DIRECTORY_SEPARATOR.'/config/parameters.yml');

        return $yaml->parse($yamlString ?: '');
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     *
     * @return EntityManager
     */
    public static function getEntityManager()
    {
        $paths     = [__DIR__.\DIRECTORY_SEPARATOR.'../Entity'];
        $isDevMode = true;

        $dbParams = [
            'driver' => 'pdo_sqlite',
            'path'   => __DIR__.'/db.sqlite',
        ];

        $cache = new \Doctrine\Common\Cache\ArrayCache();

        $reader = new AnnotationReader();
        $driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setMetadataDriverImpl($driver);
        $config->setSQLLogger(self::getLogger());
        $config->setNamingStrategy(new UnderscoreNamingStrategy(CASE_LOWER));
        $eventManager = new EventManager();
        $eventManager->addEventSubscriber(new SluggableListener());
        $eventManager->addEventSubscriber(new TimestampableListener());

        $entityManager = EntityManager::create($dbParams, $config, $eventManager);

        $platform = $entityManager->getConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        return $entityManager;
    }

    /**
     * @throws \Exception
     */
    protected static function getLogger(): SQLLogger
    {
        $log = new Logger('doctrine');
        $log->pushHandler(new StreamHandler(__DIR__.'/cache/doctrine.log'));

        return new DbalLogger($log);
    }
}
