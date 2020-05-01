<?php

namespace Sapar\Component\SfvChecker\Tests;

use org\bovigo\vfs\vfsStream;
use Sapar\Component\SfvChecker\Calculator\PhpCalculator;
use Sapar\Component\SfvChecker\LocalSfvReader;
use Sapar\Component\SfvChecker\SfvCheckManager;
use PHPUnit\Framework\TestCase;

class SfvCheckerTest extends TestCase
{
    use GeneratorTrait;

    public function setUp()
    {
        $this->root = vfsStream::setup('saparNas2');
    }

    /**
     * @dataProvider sfvProvider
     * @param $contentSfv
     * @param $rawData
     */
    public function testIsCheckable($contentSfv, $rawData)
    {
        $sfvFile = $this->writeFiles($contentSfv, $rawData);

        $sfvChecker = SfvCheckManager::create(new LocalSfvReader(), new PhpCalculator(), $sfvFile->url());

        $this->assertTrue($sfvChecker->isCheckable());
    }

}
