<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Tests\Wrapper\BinWrapper;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Tests\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper;

/**
 * @internal
 * @covers \Sapar\Component\Id3\Wrapper\BinWrapper\BinWrapperBase
 * @covers \Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper
 * @covers \Sapar\Component\Id3\Metadata\Id3Metadata
 * @covers \Sapar\Component\Id3\Metadata\Id3MetadataBase
 * @covers \Sapar\Component\Id3\Process\Process
 * @covers \Sapar\Component\Id3\Helper
 *
 */
final class Eyed3WrapperTest extends TestCase
{
    public static $originalFile;
    public static $backupFile;

    /**
     * @var Eyed3Wrapper
     */
    private $eyed3Wrapper;

    public static function setUpBeforeClass(): void
    {
        self::$originalFile = Helper::getSampleMp3File();
        self::$backupFile   = Helper::getSampleMp3File().'.back';
        copy(self::$originalFile, self::$backupFile);
    }

    public static function tearDownAfterClass(): void
    {
        unlink(self::$originalFile);
        copy(self::$backupFile, self::$originalFile);
        unlink(self::$backupFile);
    }

    protected function setUp(): void
    {
        $this->eyed3Wrapper = new Eyed3Wrapper();
        $this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());
    }

    public function testWrite(): void
    {
        $this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());

        $writeData = [
            'artist' => 'Artist',
            'title'  => 'Title',
            'album'  => 'l\'album',
            'genre'  => 'Dance Hall',
            'year'   => 2011,
            'comm'   => 'Test comment',
            'bpm'    => (float) '122',
        ];

        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        $metaDataFile->setArtist($writeData['artist']);
        $metaDataFile->setAlbum($writeData['album']);
        $metaDataFile->setTitle($writeData['title']);
        $metaDataFile->setGenre($writeData['genre']);
        $metaDataFile->setYear($writeData['year']);
        $metaDataFile->setComment($writeData['comm']);
        $metaDataFile->setBpm($writeData['bpm']);

        static::assertTrue($this->eyed3Wrapper->write($metaDataFile));

        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        static::assertTrue($this->eyed3Wrapper->read($metaDataFile));
        static::assertSame($writeData['album'], $metaDataFile->getAlbum());
        static::assertSame($writeData['title'], $metaDataFile->getTitle());
        static::assertSame($writeData['genre'], $metaDataFile->getGenre());
        static::assertSame($writeData['comm'], $metaDataFile->getComment());
        static::assertSame($writeData['bpm'], $metaDataFile->getBpm());
    }

    public function testWriteException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $eyed3Wrapper = new Eyed3Wrapper();
        $eyed3Wrapper->write($metaDataFile);
    }

    public function testReadException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $eyed3Wrapper = new Eyed3Wrapper();
        $eyed3Wrapper->read($metaDataFile);
    }

    public function testVersion(): void
    {
        $this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());
        static::assertStringContainsString('0.9.5', $this->eyed3Wrapper->getVersion());
        static::assertTrue($this->eyed3Wrapper->versionIsSupported());
    }
}
