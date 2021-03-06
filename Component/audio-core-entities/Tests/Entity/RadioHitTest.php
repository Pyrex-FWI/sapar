<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\Entity;

/**
 * @internal
 * @covers \Sapar\Component\AudioCoreEntity\Entity\RadioHit
 */
final class RadioHitTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $radioHit = self::getRadioHitInstance();
        $genre    = self::getGenreInstance('Genre');
        $genre2   = self::getGenreInstance('Genre2');
        $created  = new \DateTime('now');
        $radioHit
            ->setArtist('Artist')
            ->setTitle('Title')
            ->setCreated($created)
            ->addGenre($genre)
            ->addGenre($genre2)
            ->removeGenre($genre)

        ;

        static::assertContains('Artist', (array) $radioHit->getArtist());
        static::assertSame('Title', $radioHit->getTitle());
        static::assertSame($created, $radioHit->getCreated());
        static::assertSame($genre2, $radioHit->getGenres()->get(1));
        $radioHit->getId();
    }
}
