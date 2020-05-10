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
class ArtistTest extends EntityBase
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
        $this->assertEquals('Artist', $artist->getName());
        $this->assertEquals($media, $artist->getMedias());
    }
}
