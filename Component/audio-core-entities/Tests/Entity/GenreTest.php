<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\Entity;

/**
 * @internal
 * @covers \Sapar\Component\AudioCoreEntity\Entity\Genre
 */
final class GenreTest extends EntityBase
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
        static::assertSame('Pop', $genre->getName());
        static::assertSame($media, $genre->getMedias());
    }
}
