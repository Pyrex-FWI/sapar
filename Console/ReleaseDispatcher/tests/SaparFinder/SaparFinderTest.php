<?php

namespace Sapar\Console\ReleaseDispatcher\Tests\SaparFinder;

use PHPUnit\Framework\TestCase;
use Sapar\Console\ReleaseDispatcher\AlbumReleaseDirectory;
use Sapar\Console\ReleaseDispatcher\SaparFinder\SaparFinder;
use Sapar\Console\ReleaseDispatcher\Tests\AlbumReleaseDirectoryTrait;
use Symfony\Component\VarDumper\VarDumper;

class SaparFinderTest extends TestCase
{
  use AlbumReleaseDirectoryTrait;
  /**
   * @test
   */
  public function createAlbumReleaseFinder()
  {
    $this->generateDirectories();

    $finder = SaparFinder::createAlbumReleaseFinder('vfs://saparNas');
    $alb = $finder->getAlbumReleases();
    $this->assertInstanceOf(SaparFinder::class, $finder);
    $this->assertInstanceOf(AlbumReleaseDirectory::class, $alb[0]);
  }
}
