<?php


namespace Sapar\Component\SfvChecker\Tests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;
use Symfony\Component\VarDumper\VarDumper;

trait GeneratorTrait
{
    /** @var vfsStreamDirectory */
    private $root;


    private function generateSfvItemProperties($ext = '.rar')
    {
        $content = bin2hex(random_bytes(rand(1000, 2000)));
        $name_string = uniqid('fake-file-').$ext;
        $sfvFile = vfsStream::newFile('_'.$name_string, 0665)
                            ->withContent($content)
                            ->at($this->root)
        ;
        $hash = hash_file('crc32b', $sfvFile->url());


        return [
            $name_string,
            $content,
            $hash
        ];
    }

    private function sfvDataGenerator($limit) {
        for($i= 0; $i < $limit; $i++) {
            yield $this->generateSfvItemProperties();
        }
    }

    public function sfvProvider()
    {
        if (!$this->root) {
            $this->root = vfsStream::setup('saparNas2');
        }

        $rawData = [];
        $lines = [];
        foreach($this->sfvDataGenerator(5) as $data) {
            $rawData[] = $data;
            $lines[] = sprintf('%s %s', $data[0], $data[2]);
        }
        $lines[] = '';

        $contentSfv = implode(PHP_EOL, $lines);

        return [
            [$contentSfv, $rawData]
        ];
    }

    /**
     * @param $contentSfv
     * @param $rawData
     * @return \org\bovigo\vfs\vfsStreamFile
     */
    protected function writeFiles($contentSfv, $rawData): vfsStreamFile
    {
        foreach ($rawData as $item) {
            vfsStream::newFile($item[0], 0665)
                     ->withContent($item[1])
                     ->at($this->root)
            ;
        }
        $sfvFile = vfsStream::newFile('test.sfv', 0665)
                            ->withContent($contentSfv)
                            ->at($this->root)
        ;

        return $sfvFile;
    }
}