<?php
require_once __DIR__.'/tests/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with mechanism to retrieve EntityManager in your app
$entityManager = \AudioCoreEntity\Tests\bootstrap::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
