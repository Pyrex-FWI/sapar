<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\Entity;

/**
 * @internal
 * @covers \Sapar\Component\AudioCoreEntity\Entity\Artist
 */
final class ArtistTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $artist = self::getArtistInstance();
        $media  = self::getMediaInstance();
        $artist
            ->setName('Artist')
            ->setMedias($media)
        ;
        $artist->getId();
        $artist->getMedias();
        static::assertSame('Artist', $artist->getName());
        static::assertSame($media, $artist->getMedias());
    }
}
