<?php declare(strict_types=1);

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

class AlbumTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $album = self::getAlbumInstance();
        $media = self::getMediaInstance();
        $album
            ->setName('Album');
        $album->getId();
        $this->assertEquals('Album', $album->getName());
    }
}
