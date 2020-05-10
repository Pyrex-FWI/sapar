<?php
declare(strict_types=1);

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;
use Doctrine\Common\Collections\ArrayCollection;

class MediaTest extends EntityBase
{
    private const FAKE_GENRE = 'Genre';
    private const FAKE_ADDITIONAL_GENRE = 'Additional genre';
    private const FAKE_ARTIST = 'artist';
    private const FAKE_ADDITIONAL_ARTIST = 'Additional artist';
    private const FAKE_TITLE = 'Title';
    private const FAKE_DIR_NAME = 'DirName';
    private const FAKE_FILE_NAME = 'FileName.mp3';
    private const FILEPATH = __DIR__ . '/' . self::FAKE_FILE_NAME;

    protected static $hash;

    public static function setUpBeforeClass(): void
    {
        self::$hash = \md5(self::FILEPATH);

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


    public function testMediaMethods()
    {
        $media = self::getMediaInstance();
        $genre = self::getGenreInstance(self::FAKE_GENRE);
        $addGenre = self::getGenreInstance(self::FAKE_ADDITIONAL_GENRE);
        $artist = self::getArtistInstance(self::FAKE_ARTIST);
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

        $this->assertEquals($media->getArtist(), self::FAKE_ARTIST);
        $this->assertEquals($media->getTitle(), self::FAKE_TITLE);
        $this->assertEquals($media->getLinkedGenres()->get(0), $genre);
        $this->assertEquals($media->getArtists()->get(0), $artist);
        $this->assertEquals($media->getBpm(), 120);
        $this->assertEquals(get_class($media->getDeletedAt()), \DateTimeImmutable::class);
        $this->assertEquals(get_class($media->getReleaseDate()), \DateTimeImmutable::class);
        $this->assertEquals($media->getExist(), false);
        $this->assertEquals($media->getFileName(), self::FAKE_FILE_NAME);
        $this->assertEquals($media->getHash(), self::$hash);
        $this->assertEquals($media->getFilePath(), self::FILEPATH);
        $this->assertEquals($media->getScore(), 3);
        $this->assertEquals($media->getVersion(), 'Explicit');
        $this->assertEquals($media->getDirName(), basename(__DIR__));
        $media->getId();
        $this->assertEquals($media->getType(), 2);
    }


    public function testWrongBpm()
    {
        $this->assertNull(self::getMediaInstance()->setBpm(-100.67)->getBpm());
        $this->assertEquals(self::getMediaInstance()->setBpm(+100.67)->getBpm(), 100.67);
    }

    public function testWrongType()
    {
        $this->expectException(\InvalidArgumentException::class);
        self::getMediaInstance()->setType(100);
    }

    public function testTypes()
    {
        $this->assertArrayHasKey('audio', self::getMediaInstance()->getTypes());
        $this->assertArrayHasKey('video', self::getMediaInstance()->getTypes());
    }

    public function testWrongYear()
    {
        $this->assertNull(self::getMediaInstance()->setYear('toto')->getYear());
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
