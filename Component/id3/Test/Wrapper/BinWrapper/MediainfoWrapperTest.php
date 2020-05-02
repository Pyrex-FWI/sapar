<?php

namespace Sapar\Component\Id3\Test\Wrapper\BinWrapper;


use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper;
use Sapar\Component\Id3\Test\Helper;

class MediainfoWrapperTest extends TestCase
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
	public function testDummyFileException()
	{
        $this->expectException(\Exception::class);
        new Id3Metadata('non_exist_dummy.flac');
	}

	public function testNotExistBinException()
	{
        $this->expectException(\Exception::class);
        $this->mediaInfoWrapper->setBinPath('xxnotxxexist');
	}


	public function testWrongMp3FileException()
	{
		$metaDataFile = new Id3Metadata(Helper::getWrongMp3File());
		$this->assertFalse($this->mediaInfoWrapper->read($metaDataFile));
	}


	public function testRead()
	{
		$this->mediaInfoWrapper->setBinPath(Helper::getMediainfoPath());

		$metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
		$this->assertTrue($this->mediaInfoWrapper->read($metaDataFile));
        $this->assertEquals('Nom du morceau', $metaDataFile->getTitle());
        $this->assertEquals('Artiste', $metaDataFile->getArtist());
        $this->assertEquals('Nom de l\'album', $metaDataFile->getAlbum());
        $this->assertEquals('Celtic', $metaDataFile->getGenre());
        $this->assertEquals('2003', $metaDataFile->getYear());
        $this->assertEquals('120', $metaDataFile->getBpm());
        $this->assertEquals('87.875', $metaDataFile->getTimeDuration());

		$this->assertTrue($this->mediaInfoWrapper->supportRead($metaDataFile));
	}


    public function testReadException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $mediainfoWrapper = new MediainfoWrapper();
        $mediainfoWrapper->read($metaDataFile);
    }

	public function testWrite()
	{
		$metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
		$this->assertFalse($this->mediaInfoWrapper->supportWrite($metaDataFile));
		$this->mediaInfoWrapper->write($metaDataFile);
	}

	public function testVersion()
    {
        $this->assertTrue($this->mediaInfoWrapper->versionIsSupported());
    }
}
