<?php

namespace Sapar\Component\Id3\Test\Wrapper\BinWrapper;


use PHPUnit\Framework\TestCase;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper;
use Sapar\Component\Id3\Test\Helper;

class Eyed3WrapperTest extends TestCase
{
	public static $originalFile;
	public static $backupFile;

	/**
	 * @var Eyed3Wrapper
	 */
	private $eyed3Wrapper;

	protected function setUp(): void
	{
		$this->eyed3Wrapper = new Eyed3Wrapper();
        $this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());
    }

	public static function setUpBeforeClass(): void
	{
		self::$originalFile = Helper::getSampleMp3File();
		self::$backupFile = Helper::getSampleMp3File().".back";
		copy(self::$originalFile, self::$backupFile);
	}

	public static function tearDownAfterClass(): void
	{
		unlink(self::$originalFile);
		copy(self::$backupFile, self::$originalFile);
		unlink(self::$backupFile);
	}

	public function testWrite()
	{
		$this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());

		$writeData = [
			'artist'=> 'Artist',
			'title' => 'Title',
			'album' => 'l\'album',
			'genre' => 'Dance Hall',
			'year' 	=> 2011,
			'comm'	=> 'Test comment',
			'bpm'	=> '122',
		];

		$metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
		$metaDataFile->setArtist($writeData['artist']);
		$metaDataFile->setAlbum($writeData['album']);
		$metaDataFile->setTitle($writeData['title']);
		$metaDataFile->setGenre($writeData['genre']);
		$metaDataFile->setYear($writeData['year']);
		$metaDataFile->setComment($writeData['comm']);
		$metaDataFile->setBpm($writeData['bpm']);

		$this->assertTrue($this->eyed3Wrapper->write($metaDataFile));

		$metaDataFile = new Id3Metadata(Helper::getSampleMp3File());
		$this->assertTrue($this->eyed3Wrapper->read($metaDataFile));
		$this->assertEquals($writeData['album'], $metaDataFile->getAlbum());
		$this->assertEquals($writeData['title'], $metaDataFile->getTitle());
		$this->assertEquals($writeData['genre'], $metaDataFile->getGenre());
		$this->assertEquals($writeData['comm'], $metaDataFile->getComment());
		$this->assertEquals($writeData['bpm'], $metaDataFile->getBpm());
	}

    public function testWriteException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $eyed3Wrapper = new Eyed3Wrapper();
        $eyed3Wrapper->write($metaDataFile);
    }

    public function testReadException()
    {
        $this->expectException(\Exception::class);
        $metaDataFile = new Id3Metadata(__FILE__);
        $eyed3Wrapper = new Eyed3Wrapper();
        $eyed3Wrapper->read($metaDataFile);
    }

    public function testVersion()
    {
        $this->eyed3Wrapper->setBinPath(Helper::getEyed3Path());
		$this->assertStringContainsString('0.9.5', $this->eyed3Wrapper->getVersion());
        $this->assertTrue($this->eyed3Wrapper->versionIsSupported());
    }
}
