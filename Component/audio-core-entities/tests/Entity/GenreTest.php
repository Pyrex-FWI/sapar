<?php

declare(strict_types=1);

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

/**
 * @internal
 * @coversNothing
 */
class GenreTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $genre = self::getGenreInstance();
        $media = self::getMediaInstance();
        $genre
            ->setName('Pop')
            ->setMedias($media)
        ;
        $genre->getId();
        $genre->getMedias();
        $this->assertEquals('Pop', $genre->getName());
        $this->assertEquals($media, $genre->getMedias());
    }
}
