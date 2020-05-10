<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 * @covers \AudioCoreEntity\Entity\Media
 * @covers \AudioCoreEntity\Repository\MediaRepository
 */
final class MediaTest extends EntityBase
{
    private const FAKE_GENRE             = 'Genre';
    private const FAKE_ADDITIONAL_GENRE  = 'Additional genre';
    private const FAKE_ARTIST            = 'artist';
    private const FAKE_ADDITIONAL_ARTIST = 'Additional artist';
    private const FAKE_TITLE             = 'Title';
    private const FAKE_DIR_NAME          = 'DirName';
    private const FAKE_FILE_NAME         = 'FileName.mp3';
    private const FILEPATH               = __DIR__.'/'.self::FAKE_FILE_NAME;

    protected static $hash;

    public static function setUpBeforeClass(): void
    {
        self::$hash = md5(self::FILEPATH);

        parent::setUpBeforeClass();
        self::cleanFixtures();
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->cleanFixtures();
    }

    public function testMediaMethods(): void
    {
        $media     = self::getMediaInstance();
        $genre     = self::getGenreInstance(self::FAKE_GENRE);
        $addGenre  = self::getGenreInstance(self::FAKE_ADDITIONAL_GENRE);
        $artist    = self::getArtistInstance(self::FAKE_ARTIST);
        $addArtist = self::getArtistInstance(self::FAKE_ADDITIONAL_ARTIST);

        $media
            ->setArtist($artist->getName())
            ->setTitle(self::FAKE_TITLE)
            ->setLinkedGenres(new ArrayCollection([$genre]))
            ->setBpm(120)
            ->setDeletedAt(new \DateTimeImmutable('now'))
            ->setDirName(self::FAKE_DIR_NAME)
            ->setFileName(self::FAKE_FILE_NAME)
            ->setHash(self::$hash)
            ->setFilePath(self::FILEPATH)
            ->setReleaseDate(new \DateTimeImmutable('now'))
            ->setScore(3)
            ->setTagged(true)
            ->setType(2)
            ->setYear(2000)
            ->setVersion('Explicit')
            ->addGenre($addGenre)
            ->removeGenre($addGenre)
            ->addArtist($addArtist)
            ->removeArtist($addArtist)
            ->setArtists(new ArrayCollection([$artist]))
            ->setExist(false)
        ;

        self::$em->persist($media);
        self::$em->flush();

        static::assertSame($media->getArtist(), self::FAKE_ARTIST);
        static::assertSame($media->getTitle(), self::FAKE_TITLE);
        static::assertSame($media->getLinkedGenres()->get(0), $genre);
        static::assertSame($media->getArtists()->get(0), $artist);
        static::assertSame($media->getBpm(), 120);
        static::assertSame(\get_class($media->getDeletedAt()), \DateTimeImmutable::class);
        static::assertSame(\get_class($media->getReleaseDate()), \DateTimeImmutable::class);
        static::assertSame($media->getExist(), false);
        static::assertSame($media->getFileName(), self::FAKE_FILE_NAME);
        static::assertSame($media->getHash(), self::$hash);
        static::assertSame($media->getFilePath(), self::FILEPATH);
        static::assertSame($media->getScore(), 3);
        static::assertSame($media->getVersion(), 'Explicit');
        static::assertSame($media->getDirName(), basename(__DIR__));
        static::assertIsInt($media->getId());
        static::assertFalse($media->getExist());
        static::assertSame($media->getType(), 2);
    }

    public function testWrongBpm(): void
    {
        static::assertNull(self::getMediaInstance()->setBpm(-100.67)->getBpm());
        static::assertSame(self::getMediaInstance()->setBpm(+100.67)->getBpm(), 100.67);
    }

    public function testWrongType(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        self::getMediaInstance()->setType(100);
    }

    public function testTypes(): void
    {
        static::assertArrayHasKey('audio', self::getMediaInstance()->getTypes());
        static::assertArrayHasKey('video', self::getMediaInstance()->getTypes());
    }

    public function testWrongYear(): void
    {
        static::assertNull(self::getMediaInstance()->setYear('toto')->getYear());
    }

    protected static function cleanFixtures(): void
    {
        if ($m = self::$mediaRespository->findOneBy(['hash' => self::$hash])) {
            self::$em->remove($m);
        }
        if ($g = self::$genreRepository->findOneBy(['name' => self::FAKE_GENRE])) {
            self::$em->remove($g);
        }
        if ($a = self::$artistRepository->findOneBy(['name' => self::FAKE_ARTIST])) {
            self::$em->remove($a);
        }
        self::$em->flush();
    }
}
