<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Test\Wrapper\BinWrapper;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Test\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper;

/**
 * @internal
 * @coversNothing
 */
final class MediainfoWrapperTest extends TestCase
{
    /**
     * @var MediainfoWrapper
     */
    private $mediaInfoWrapper;

    protected function setUp(): void
    {
        $this->mediaInfoWrapper = $this->getMediainfoWrapper();
        $this->mediaInfoWrapper->setBinPath(Helper::getMediainfoPath());
    }

    /**
     * @return MediainfoWrapper
     */
    public function getMediainfoWrapper()
    {
        return new  MediainfoWrapper();
    }

    public function testDummyFileException(): void
    {
        $this->expectException(\Exception::class);
        new Id3Metadata('non_exist_dummy.flac');
    }

    public function testNotExistBinException(): void
    {
        $this->expectException(\Exception::class);
        $this->mediaInfoWrapper->setBinPath('xxnotxxexist');
    }

    public function testWrongMp3FileException(): void
    {
        $metaDataFile = new Id3Metadata(Helper::getWrongMp3File());
        static::assertFalse($this->mediaInfoWrapper->read($metaDataFile));
    }

    public function testRead(): void
    {
        $this->mediaInfoWrapper->setBinPath(Helper::getMediainfoPath());

        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        static::assertTrue($this->mediaInfoWrapper->read($metaDataFile));
        static::assertSame('Nom du morceau', $metaDataFile->getTitle());
        static::assertSame('Artiste', $metaDataFile->getArtist());
        static::assertSame('Nom de l\'album', $metaDataFile->getAlbum());
        static::assertSame('Celtic', $metaDataFile->getGenre());
        static::assertSame(2003, $metaDataFile->getYear());
        static::assertSame(120.0, $metaDataFile->getBpm());
        static::assertSame(87.875, $metaDataFile->getTimeDuration());

        static::assertTrue($this->mediaInfoWrapper->supportRead($metaDataFile));
    }

    public function testReadException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile     = new Id3Metadata(__FILE__);
        $mediainfoWrapper = new MediainfoWrapper();
        $mediainfoWrapper->read($metaDataFile);
    }

    public function testWrite(): void
    {
        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        static::assertFalse($this->mediaInfoWrapper->supportWrite($metaDataFile));
        $this->mediaInfoWrapper->write($metaDataFile);
    }

    public function testVersion(): void
    {
        static::assertTrue($this->mediaInfoWrapper->versionIsSupported());
    }
}
