<?php

namespace Sapar\Component\Id3\Test\Wrapper\BinWrapper;

use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Test\Helper;
use Sapar\Component\Id3\Wrapper\BinWrapper\FfprobeWrapper;

class FfprobeWrapperTest extends TestCase
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

	public function testDummyFileException()
	{
        $this->expectException(\Exception::class);
		new Id3Metadata('non_exist_dummy.flac');
	}

	public function testNotExistBinException()
	{
        $this->expectException(\Exception::class);
		$this->ffprobeWrapper->setBinPath('xxnotxxexist');
	}

	public function testWrongMp3FileException()
	{
		$metaDataFile = new Id3Metadata(Helper::getWrongMp3File());
		$this->assertFalse($this->ffprobeWrapper->read($metaDataFile));
	}

	public function testRead()
	{
		$this->ffprobeWrapper->setBinPath(Helper::getFfprobePath());

		$metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
		$this->ffprobeWrapper->read($metaDataFile);
        $this->assertEquals('Nom du morceau', $metaDataFile->getTitle());
        $this->assertEquals('Artiste', $metaDataFile->getArtist());
        $this->assertEquals('Nom de l\'album', $metaDataFile->getAlbum());
        $this->assertEquals('Celtic', $metaDataFile->getGenre());
        $this->assertEquals('2003', $metaDataFile->getYear());
        $this->assertEquals('120', $metaDataFile->getBpm());

		$this->assertTrue($this->ffprobeWrapper->supportRead($metaDataFile));

	}

    public function testReadException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $ffprobeWrapper = new FfprobeWrapper();
        $ffprobeWrapper->read($metaDataFile);
    }

    public function testWrite()
    {
        $metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
        $this->assertFalse($this->ffprobeWrapper->supportWrite($metaDataFile));
        $this->ffprobeWrapper->write($metaDataFile);
    }

    public function testVersion()
    {
        $this->ffprobeWrapper->setBinPath(Helper::getFfprobePath());
        $this->assertTrue($this->ffprobeWrapper->versionIsSupported());
    }
}
