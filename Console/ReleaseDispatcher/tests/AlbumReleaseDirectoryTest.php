<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 08/02/2019
 * Time: 22:36
 */

namespace Sapar\Console\ReleaseDispatcher\Tests;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Sapar\Console\ReleaseDispatcher\AlbumReleaseDirectory;
use Sapar\Console\ReleaseDispatcher\SaparFinder\SaparFinder;
use Symfony\Component\Finder\Finder;
use Symfony\Component\VarDumper\VarDumper;

class AlbumReleaseDirectoryTest extends TestCase
{
    use AlbumReleaseDirectoryTrait;

    private $root;

    /**
     *
     */
    public function testInstance()
    {
      $this->generateDirectories();
      $rootPath = vfsStream::url(Test::VFS_SAPAR_NAS);
      $finder   = SaparFinder::createAlbumReleaseFinder($rootPath);

      foreach ($finder as $item) {
        $name = $item->getPathName();
        $release = new AlbumReleaseDirectory($name);
        $this->assertTrue($release->isValid());
        $this->assertIsString($release->getLang());
        $this->assertIsString($release->getGroup());
        $this->assertIsInt($release->getYear());
      }

      $this->assertCount(626, $finder);
    }
}
