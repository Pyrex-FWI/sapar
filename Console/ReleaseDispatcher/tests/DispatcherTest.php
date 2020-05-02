<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 10/02/2019
 * Time: 15:27
 */

namespace Sapar\Console\ReleaseDispatcher\Tests;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use Sapar\Console\ReleaseDispatcher\AlbumReleaseDirectory;
use Sapar\Console\ReleaseDispatcher\Config\Configuration;
use Sapar\Console\ReleaseDispatcher\Dispatcher;
use Sapar\Console\ReleaseDispatcher\SaparFinder\SaparFinder;
use SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class DispatcherTest extends TestCase
{
    use AlbumReleaseDirectoryTrait;

    public function testDispatchReleasesTest()
    {
        $this->generateDirectories();
        $rootPath                       = vfsStream::url(Test::VFS_SAPAR_NAS);
        $config                         = Yaml::parseFile(__DIR__ . DIRECTORY_SEPARATOR . Configuration::CONFIG_FILE)['release_dispatcher'];
        $config['dispatcher']['target_path'] = $rootPath;
        $dispatcher                     = new Dispatcher($config['dispatcher']['target_format'], $config['dispatcher']['target_path']);

        /** @var SplFileInfo[] $objects */
        $finder   = SaparFinder::createAlbumReleaseFinder($rootPath);

        foreach ($finder as $item) {
          $name = $item->getPathName();
          $releaseDirectory = new AlbumReleaseDirectory($name);
          $releaseDirectory->prepare();
          $dispatcher->move($releaseDirectory);
        }
        /** @var SplFileInfo[] $objects */
        $objects = array_keys(iterator_to_array(new RecursiveDirectoryIterator($rootPath, RecursiveDirectoryIterator::SKIP_DOTS)));
        $this->assertCount(37, $objects);
        $this->assertEquals('vfs://'.Test::VFS_SAPAR_NAS.'/_iHR', $objects[32]);
    }
}
