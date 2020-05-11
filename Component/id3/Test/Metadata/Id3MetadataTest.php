<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Test\Metadata;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Test\Helper;
use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * @internal
 * @coversNothing
 */
final class Id3MetadataTest extends TestCase
{
    /**
     * @return array
     */
    public function id3MetadataProvider()
    {
        return [
            [$this->getId3MetadataInstance()],
        ];
    }

    /**
     * @dataProvider id3MetadataProvider
     */
    public function testInstance(Id3MetadataInterface $id3Metadata): void
    {
        static::assertInstanceOf('Sapar\Contract\Id3\Id3MetadataInterface', $id3Metadata);
    }

    /**
     * @dataProvider id3MetadataProvider
     */
    public function testSerializeUnserialize(Id3MetadataInterface $id3Metadata): void
    {
        $serializeData = serialize($id3Metadata);
        static::assertTrue(\is_string($serializeData));
        $object = unserialize($serializeData);
        static::assertInstanceOf('Sapar\Contract\Id3\Id3MetadataInterface', $object);
        static::assertInstanceOf('\SplFileInfo', $object->getFile());
    }

    /**
     * @dataProvider id3MetadataProvider
     */
    public function testJsonEncodeDecode(Id3MetadataInterface $id3Metadata): void
    {
        $file = Helper::getSampleMp3File();
        $json = sprintf(
            '{"file":"%s","album":null,"title":null,"artist":null,"artists":[],"genre":null,"genres":[],"comment":null,"year":null,"key":null,"bpm":null,"duration":null, "_reader": null, "_readCmd": null,  "_execTime": null}',
            $file
            );

        static::assertJsonStringEqualsJsonString(
            $json,
            json_encode($id3Metadata)
        );
    }

    /**
     * @dataProvider id3MetadataProvider
     */
    public function testMethodsExistence(Id3MetadataInterface $id3Metadata): void
    {
        static::assertTrue(method_exists($id3Metadata, 'setAllArtists'));
        static::assertTrue(method_exists($id3Metadata, 'getAllArtists'));
        static::assertTrue(method_exists($id3Metadata, 'setAllGenres'));
        static::assertTrue(method_exists($id3Metadata, 'getAllGenres'));
        static::assertTrue(method_exists($id3Metadata, 'setTitle'));
        static::assertTrue(method_exists($id3Metadata, 'getTitle'));
        static::assertTrue(method_exists($id3Metadata, 'setArtist'));
        static::assertTrue(method_exists($id3Metadata, 'getArtist'));
        static::assertTrue(method_exists($id3Metadata, 'setComment'));
        static::assertTrue(method_exists($id3Metadata, 'getComment'));
        static::assertTrue(method_exists($id3Metadata, 'setYear'));
        static::assertTrue(method_exists($id3Metadata, 'getYear'));
        static::assertTrue(method_exists($id3Metadata, 'setGenre'));
        static::assertTrue(method_exists($id3Metadata, 'getGenre'));
        static::assertTrue(method_exists($id3Metadata, 'setKey'));
        static::assertTrue(method_exists($id3Metadata, 'getKey'));
    }

    /**
     * @dataProvider id3MetadataProvider
     */
    public function testMethod(Id3MetadataInterface $id3Metadata): void
    {
        $id3Metadata->setAllArtists(self::getArtists());
        static::assertSame(self::getArtists(), $id3Metadata->getAllArtists());
        $id3Metadata->setAllGenres(self::getGenres());
        static::assertSame(self::getGenres(), $id3Metadata->getAllGenres());
        $id3Metadata->setTitle(self::getTitle());
        static::assertSame(self::getTitle(), $id3Metadata->getTitle());
        $id3Metadata->setArtist(self::getArtists()[0]);
        static::assertSame(self::getArtists()[0], $id3Metadata->getArtist());
        $id3Metadata->setComment(self::getComment());
        static::assertSame(self::getComment(), $id3Metadata->getComment());
        $id3Metadata->setYear(self::getYear());
        static::assertSame(self::getYear(), $id3Metadata->getYear());
        $id3Metadata->setGenre(self::getGenres()[0]);
        static::assertSame(self::getGenres()[0], $id3Metadata->getGenre());
        $id3Metadata->setKey(self::getKey());
        static::assertSame(self::getKey(), $id3Metadata->getKey());
        $id3Metadata->setTimeDuration(self::getDuration());
        static::assertSame(self::getDuration(), $id3Metadata->getTimeDuration());
    }

    /**
     * @return array
     */
    public static function getGenres()
    {
        return ['Techno', 'House'];
    }

    /**
     * @return array
     */
    public static function getArtists()
    {
        return ['Aidonia', 'Slaï', 'Admiral T'];
    }

    /**
     * @return string
     */
    public static function getTitle()
    {
        return 'My song title';
    }

    public static function getComment()
    {
        return 'My song comment and other some text';
    }

    public static function getYear()
    {
        return 2010;
    }

    public static function getKey()
    {
        return '2Bm';
    }

    /**
     * @return float
     */
    public static function getDuration()
    {
        return 850.50;
    }

    /**
     * @return Id3MetadataInterface
     */
    private function getId3MetadataInstance()
    {
        return new Id3Metadata(Helper::getSampleMp3File());
    }
}
