<?php

declare(strict_types=1);

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

/**
 * @internal
 * @coversNothing
 */
class RadioHitTest extends EntityBase
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

        $this->assertContains('Artist', (array) $radioHit->getArtist());
        $this->assertEquals('Title', $radioHit->getTitle());
        $this->assertEquals($created, $radioHit->getCreated());
        $this->assertEquals($genre2, $radioHit->getGenres()->get(1));
        $radioHit->getId();
    }
}
