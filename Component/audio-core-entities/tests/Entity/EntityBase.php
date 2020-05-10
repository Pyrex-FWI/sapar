<?php

declare(strict_types=1);

namespace AudioCoreEntity\Tests;

use AudioCoreEntity\Entity\Album;
use AudioCoreEntity\Entity\Artist;
use AudioCoreEntity\Entity\DeletedRelease;
use AudioCoreEntity\Entity\Genre;
use AudioCoreEntity\Entity\Media;
use AudioCoreEntity\Entity\Radio;
use AudioCoreEntity\Entity\RadioHit;
use AudioCoreEntity\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

abstract class EntityBase extends TestCase
{
    /** @var EntityManagerInterface */
    public static $em;
    /**
     * @var MediaRepository
     */
    protected static $mediaRespository;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    protected static $genreRepository;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    protected static $artistRepository;

    public static function setUpBeforeClass(): void
    {
        self::$em               = bootstrap::getEntityManager();
        self::$mediaRespository = self::$em->getRepository(Media::class);
        self::$genreRepository  = self::$em->getRepository(Genre::class);
        self::$artistRepository = self::$em->getRepository(Artist::class);
    }

    /**
     * @param null $name
     *
     * @return Genre
     */
    public static function getGenreInstance($name = null)
    {
        return new Genre($name);
    }

    public static function getMediaInstance()
    {
        return new Media();
    }

    /**
     * @param null $name
     *
     * @return Genre
     */
    public static function getArtistInstance($name = null)
    {
        return new Artist($name);
    }

    /**
     * @param null $name
     *
     * @return Album
     */
    public static function getAlbumInstance($name = null)
    {
        return new Album($name);
    }

    /**
     * @return DeletedRelease
     */
    public static function getDeletedReleaseInstance()
    {
        return new DeletedRelease();
    }

    /**
     * @return Radio
     */
    public static function getRadioInstance()
    {
        return new Radio();
    }

    /**
     * @return RadioHit
     */
    public static function getRadioHitInstance()
    {
        return new RadioHit();
    }
}
