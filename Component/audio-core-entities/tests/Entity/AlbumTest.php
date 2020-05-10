<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

/**
 * @internal
 * @coversNothing
 */
class AlbumTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $album = self::getAlbumInstance();
        $media = self::getMediaInstance();
        $album
            ->setName('Album')
        ;
        $album->getId();
        $this->assertEquals('Album', $album->getName());
    }
}
