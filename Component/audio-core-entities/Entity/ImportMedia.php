<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Sapar\Component\AudioCoreEntity\Repository\ImportMediaRepository")
 */
class ImportMedia extends Media
{
}
