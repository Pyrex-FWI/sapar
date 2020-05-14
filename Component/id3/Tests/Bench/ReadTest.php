<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Tests\Bench;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Tests\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper;

/**
 * @internal
 * @covers \Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper
 * @covers \Sapar\Component\Id3\Wrapper\BinWrapper\BinWrapperBase
 * @covers \Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper
 * @covers \Sapar\Component\Id3\Metadata\Id3MetadataBase
 * @covers \Sapar\Component\Id3\Helper
 * @covers \Sapar\Component\Id3\Process\Process
 */
final class ReadTest extends TestCase
{
    /**
     * @var MediainfoWrapper
     */
    public static $mediainfo;
    /**
     * @var Eyed3Wrapper
     */
    public static $eyed3;

    /**
     * @var Id3Metadata
     */
    public static $id3meta;

    public static function setUpBeforeClass(): void
    {
        self::$id3meta = new Id3Metadata(Helper::getSampleMp3File());
        self::$eyed3   = new Eyed3Wrapper();
        self::$eyed3->setBinPath(Helper::getEyed3Path());
        self::$mediainfo = new MediainfoWrapper();
        self::$mediainfo->setBinPath(Helper::getMediainfoPath());
    }

    /**
     * @group eyed3-read
     *
     * @throws \Exception
     */
    public function testReadEyed3(): void
    {
        static::assertTrue(self::$eyed3->read(self::$id3meta));
    }

    /**
     * @group mediainfo-read
     *
     * @throws \Exception
     */
    public function testReadMediainfo(): void
    {
        static::assertTrue(self::$mediainfo->read(self::$id3meta));
    }
}
