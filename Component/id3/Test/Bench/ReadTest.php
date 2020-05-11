<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Test\Bench;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Test\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper;

/**
 * @internal
 * @coversNothing
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
        self::$id3meta = new \Sapar\Component\Id3\Metadata\Id3Metadata(Helper::getSampleMp3File());
        self::$eyed3   = new \Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper();
        self::$eyed3->setBinPath(Helper::getEyed3Path());
        self::$mediainfo = new \Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper();
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
