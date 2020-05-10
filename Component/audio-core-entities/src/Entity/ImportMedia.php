<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AudioCoreEntity\Repository\ImportMediaRepository")
 */
class ImportMedia extends Media
{
}
