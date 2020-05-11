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
use Sapar\Component\Id3\Wrapper\BinWrapper\FfprobeWrapper;

/**
 * @internal
 * @coversNothing
 */
final class FfprobeWrapperTest extends TestCase
{
    /**
     * @var FfprobeWrapper
     */
    private $ffprobeWrapper;

    protected function setUp(): void
    {
        $this->ffprobeWrapper = $this->getFfprobeWrapper();
        $this->ffprobeWrapper->setBinPath(Helper::getFfprobePath());
    }

    /**
     * @return FfprobeWrapper
     */
    public function getFfprobeWrapper()
    {
        return new  FfprobeWrapper();
    }

    public function testDummyFileException(): void
    {
        $this->expectException(\Exception::class);
        new Id3Metadata('non_exist_dummy.flac');
    }

    public function testNotExistBinException(): void
    {
        $this->expectException(\Exception::class);
        $this->ffprobeWrapper->setBinPath('xxnotxxexist');
    }

    public function testWrongMp3FileException(): void
    {
        $metaDataFile = new Id3Metadata(Helper::getWrongMp3File());
        static::assertFalse($this->ffprobeWrapper->read($metaDataFile));
    }

    public function testRead(): void
    {
        $this->ffprobeWrapper->setBinPath(Helper::getFfprobePath());

        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        $this->ffprobeWrapper->read($metaDataFile);
        static::assertSame('Nom du morceau', $metaDataFile->getTitle());
        static::assertSame('Artiste', $metaDataFile->getArtist());
        static::assertSame('Nom de l\'album', $metaDataFile->getAlbum());
        static::assertSame('Celtic', $metaDataFile->getGenre());
        static::assertSame(2003, $metaDataFile->getYear());
        static::assertSame(120.0, $metaDataFile->getBpm());

        static::assertTrue($this->ffprobeWrapper->supportRead($metaDataFile));
    }

    public function testReadException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile   = new Id3Metadata(__FILE__);
        $ffprobeWrapper = new FfprobeWrapper();
        $ffprobeWrapper->read($metaDataFile);
    }

    public function testWrite(): void
    {
        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        static::assertFalse($this->ffprobeWrapper->supportWrite($metaDataFile));
        $this->ffprobeWrapper->write($metaDataFile);
    }

    public function testVersion(): void
    {
        $this->ffprobeWrapper->setBinPath(Helper::getFfprobePath());
        static::assertTrue($this->ffprobeWrapper->versionIsSupported());
    }
}
