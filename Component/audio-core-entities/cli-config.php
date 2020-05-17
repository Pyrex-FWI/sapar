<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

require_once __DIR__.'/Tests/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with mechanism to retrieve EntityManager in your app
$entityManager = \Sapar\Component\AudioCoreEntity\Tests\bootstrap::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
