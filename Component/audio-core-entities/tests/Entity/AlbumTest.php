<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

/**
 * @internal
 * @covers \AudioCoreEntity\Entity\Album
 */
final class AlbumTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $album = self::getAlbumInstance();
        $media = self::getMediaInstance();
        $album
            ->setName('Album')
        ;
        $album->getId();
        static::assertSame('Album', $album->getName());
    }
}
