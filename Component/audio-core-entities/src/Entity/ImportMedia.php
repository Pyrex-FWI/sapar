<?php

namespace AudioCoreEntity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AudioCoreEntity\Repository\ImportMediaRepository")
 */
class ImportMedia extends Media
{
}
