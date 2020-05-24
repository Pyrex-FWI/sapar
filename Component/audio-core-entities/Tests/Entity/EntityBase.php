<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\Entity;

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Sapar\Component\AudioCoreEntity\Entity\Album;
use Sapar\Component\AudioCoreEntity\Entity\Artist;
use Sapar\Component\AudioCoreEntity\Entity\DeletedRelease;
use Sapar\Component\AudioCoreEntity\Entity\Genre;
use Sapar\Component\AudioCoreEntity\Entity\Media;
use Sapar\Component\AudioCoreEntity\Entity\Radio;
use Sapar\Component\AudioCoreEntity\Entity\RadioHit;
use Sapar\Component\AudioCoreEntity\Repository\MediaRepository;
use Sapar\Component\AudioCoreEntity\Tests\bootstrap;

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
     * @return Genre
     */
    public static function getGenreInstance(?string $name = null)
    {
        return new Genre($name);
    }

    public static function getMediaInstance()
    {
        return new Media();
    }

    /**
     * @return Artist
     */
    public static function getArtistInstance(?string $name = null)
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
