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
use Sapar\Component\Id3\Wrapper\BinWrapper\MetaflacWrapper;

/**
 * Class MetaflacWrapperTest.
 *
 * @internal
 * @coversNothing
 */
final class MetaflacWrapperTest extends TestCase
{
    /**
     * @var MetaflacWrapper
     */
    private $metaflacWrapper;

    protected function setUp(): void
    {
        $this->metaflacWrapper = $this->getMetafacWrapper();
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());
    }

    /**
     * @return MetaflacWrapper
     */
    public function getMetafacWrapper()
    {
        return new  MetaflacWrapper();
    }

    public function testNotExistBinException(): void
    {
        $this->expectException(\Exception::class);
        $this->metaflacWrapper->setBinPath('xxnotxxexist');
    }

    public function testRead(): void
    {
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

        $metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());
        if ($this->metaflacWrapper->read($metaDataFile)) {
            static::assertSame('Flac title', $metaDataFile->getTitle());
            static::assertSame('Flac artist', $metaDataFile->getArtist());
            static::assertSame('Flac album', $metaDataFile->getAlbum());
            static::assertSame('Flac Genre', $metaDataFile->getGenre());
            static::assertSame(2000, $metaDataFile->getYear());
            static::assertSame(0, (int) ($metaDataFile->getBpm()));
        }

        static::assertTrue($this->metaflacWrapper->supportRead($metaDataFile));
    }

    public function testReadException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile   = new Id3Metadata(__FILE__);
        $meaflacWrapper = new MetaflacWrapper();
        $meaflacWrapper->read($metaDataFile);
    }

    public function testWriteException(): void
    {
        $this->expectException(\Exception::class);
        $metaDataFile   = new Id3Metadata(__FILE__);
        $meaflacWrapper = new MetaflacWrapper();
        $meaflacWrapper->write($metaDataFile);
    }

    public function testWrite(): void
    {
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

        $writeData = [
            'title'  => 'Title',
            'album'  => 'l\'album',
            'genre'  => 'Dance Hall',
            'artist' => 'Some artist',
            'year'   => 2011,
            'comm'   => 'Test comment',
            'bpm'    => (float) '122',
        ];
        Helper::backupFile(Helper::getSampleFlacFile());
        $metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());

        $metaDataFile->setAlbum($writeData['album']);
        $metaDataFile->setArtist($writeData['artist']);
        $metaDataFile->setTitle($writeData['title']);
        $metaDataFile->setGenre($writeData['genre']);
        $metaDataFile->setYear($writeData['year']);
        $metaDataFile->setComment($writeData['comm']);
        $metaDataFile->setBpm($writeData['bpm']);
        static::assertTrue($this->metaflacWrapper->write($metaDataFile));

        $metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());
        static::assertTrue($this->metaflacWrapper->read($metaDataFile));
        static::assertSame($writeData['album'], $metaDataFile->getAlbum());
        static::assertSame($writeData['artist'], $metaDataFile->getArtist());
        static::assertSame($writeData['title'], $metaDataFile->getTitle());
        static::assertSame($writeData['genre'], $metaDataFile->getGenre());
        static::assertSame($writeData['comm'], $metaDataFile->getComment());
        static::assertSame($writeData['bpm'], (float) ($metaDataFile->getBpm()));

        Helper::restoreFile(Helper::getSampleFlacFile());
    }

    public function testWriteNull(): void
    {
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

        $writeData = [
            'title'  => null,
            'album'  => null,
            'genre'  => null,
            'artist' => null,
            'year'   => null,
            'comm'   => null,
            'bpm'    => null,
        ];
        Helper::backupFile(Helper::getSampleFlacFile());

        $metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());

        $metaDataFile->setAlbum((string) $writeData['album']);
        $metaDataFile->setArtist((string) $writeData['artist']);
        $metaDataFile->setTitle((string) $writeData['title']);
        $metaDataFile->setGenre((string) $writeData['genre']);
        $metaDataFile->setYear($writeData['year'] ? (int) $writeData['year'] : null);
        $metaDataFile->setComment((string) $writeData['comm']);
        $metaDataFile->setBpm((float) $writeData['bpm']);
        static::assertTrue($this->metaflacWrapper->write($metaDataFile));

        Helper::restoreFile(Helper::getSampleFlacFile());
    }

    public function testVersion(): void
    {
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());
        static::assertTrue($this->metaflacWrapper->versionIsSupported());
    }
}
