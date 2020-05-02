<?php

namespace Sapar\Component\SfvChecker\Tests;

use org\bovigo\vfs\vfsStream;
use Sapar\Component\SfvChecker\LocalSfvReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\InvalidArgumentException;

/**
 * Class FileSystemReaderTest
 */
class FileSystemReaderTest extends TestCase
{
    use GeneratorTrait;

    public function setUp()
    {
        $this->root = vfsStream::setup('saparNas');
    }

    /**
     * @expectedException \Symfony\Component\Filesystem\Exception\FileNotFoundException
     */
    public function testReadNoExistantFile()
    {
        LocalSfvReader::read('/some/path.sfv');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testReadWrongExtension()
    {
        $f = vfsStream::newFile('test.txt')->at($this->root)->setContent("The new contents of the file");
        LocalSfvReader::read($f->url());
    }

    /**
     * @dataProvider sfvProvider
     */
    public function testRead($contentSfv, $rawData)
    {
        $sfvFile = $this->writeFiles($contentSfv, $rawData);

        $sfvItemCollection = LocalSfvReader::read($sfvFile->url());
        $this->assertCount(5, $sfvItemCollection);
    }

}
