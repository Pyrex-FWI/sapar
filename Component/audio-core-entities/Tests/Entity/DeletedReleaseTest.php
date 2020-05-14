<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\Entity;

/**
 * @internal
 * @coversNothing
 */
final class DeletedReleaseTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $deletedRelease = self::getDeletedReleaseInstance();
        $now            = new \DateTime('now');
        $deletedRelease
            ->setAlbumName('AlbumName')
            ->setArtistName('ArtistName')
            ->setDeletedDate($now)
            ->setGenre('Genre')
            ->setRawName('Raw_Name')
            ;
        static::assertSame('AlbumName', $deletedRelease->getAlbumName());
        static::assertSame('ArtistName', $deletedRelease->getArtistName());
        static::assertSame($now, $deletedRelease->getDeletedDate());
        static::assertSame('Genre', $deletedRelease->getGenre());
        static::assertSame('Raw_Name', $deletedRelease->getRawName());
        $deletedRelease->getId();
    }
}
