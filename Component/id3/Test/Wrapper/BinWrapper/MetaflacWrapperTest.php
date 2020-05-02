<?php

namespace Sapar\Component\Id3\Test\Wrapper\BinWrapper;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Test\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MetaflacWrapper;

/**
 * Class MetaflacWrapperTest
 * @package Sapar\Component\Id3\Test\Wrapper\BinWrapper
 */
class MetaflacWrapperTest extends TestCase
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

	public function testNotExistBinException()
	{
	    $this->expectException(\Exception::class);
		$this->metaflacWrapper->setBinPath('xxnotxxexist');
	}

	public function testRead()
	{
		$this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

		$metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());
		if ($this->metaflacWrapper->read($metaDataFile)) {
			$this->assertEquals('Flac title', $metaDataFile->getTitle());
			$this->assertEquals('Flac artist', $metaDataFile->getArtist());
			$this->assertEquals('Flac album', $metaDataFile->getAlbum());
			$this->assertEquals('Flac Genre', $metaDataFile->getGenre());
			$this->assertEquals('2000', $metaDataFile->getYear());
			$this->assertEquals('0', intval($metaDataFile->getBpm()));
		}

		$this->assertTrue($this->metaflacWrapper->supportRead($metaDataFile));

	}

    public function testReadException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $meaflacWrapper = new MetaflacWrapper();
        $meaflacWrapper->read($metaDataFile);
    }

    public function testWriteException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $meaflacWrapper = new MetaflacWrapper();
        $meaflacWrapper->write($metaDataFile);
    }

    public function testWrite()
	{
		$this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

		$writeData = [
			'title' => 'Title',
			'album' => 'l\'album',
			'genre' => 'Dance Hall',
            'artist'=> 'Some artist',
			'year' 	=> 2011,
			'comm'	=> 'Test comment',
			'bpm'	=> '122',

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
		$this->assertTrue($this->metaflacWrapper->write($metaDataFile));

		$metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());
		$this->assertTrue($this->metaflacWrapper->read($metaDataFile));
		$this->assertEquals($writeData['album'], $metaDataFile->getAlbum());
		$this->assertEquals($writeData['artist'], $metaDataFile->getArtist());
		$this->assertEquals($writeData['title'], $metaDataFile->getTitle());
		$this->assertEquals($writeData['genre'], $metaDataFile->getGenre());
		$this->assertEquals($writeData['comm'], $metaDataFile->getComment());
		$this->assertEquals($writeData['bpm'], intval($metaDataFile->getBpm()));

		Helper::restoreFile(Helper::getSampleFlacFile());
	}

    public function testWriteNull()
	{
		$this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());

		$writeData = [
			'title' => null,
			'album' => null,
			'genre' => null,
            'artist'=> null,
			'year' 	=> null,
			'comm'	=> null,
			'bpm'	=> null,

		];
        Helper::backupFile(Helper::getSampleFlacFile());

        $metaDataFile = new Id3Metadata(Helper::getSampleFlacFile());

		$metaDataFile->setAlbum((string) $writeData['album']);
		$metaDataFile->setArtist((string) $writeData['artist']);
		$metaDataFile->setTitle((string) $writeData['title']);
		$metaDataFile->setGenre((string) $writeData['genre']);
		$metaDataFile->setYear((float) $writeData['year']);
		$metaDataFile->setComment((string) $writeData['comm']);
		$metaDataFile->setBpm((float) $writeData['bpm']);
        $this->assertTrue($this->metaflacWrapper->write($metaDataFile));

        Helper::restoreFile(Helper::getSampleFlacFile());
    }

    public function testVersion()
    {
        $this->metaflacWrapper->setBinPath(Helper::getMetaflacPath());
        $this->assertTrue($this->metaflacWrapper->versionIsSupported());
    }
}
