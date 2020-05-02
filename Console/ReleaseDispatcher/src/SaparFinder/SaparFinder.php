<?php

namespace Sapar\Console\ReleaseDispatcher\SaparFinder;

use Sapar\Console\ReleaseDispatcher\AlbumReleaseDirectory;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class SaparFinder
 *
 */
class SaparFinder extends Finder
{
  /**
   * @param $inPath
   * @return SaparFinder
   */
  public static function  createAlbumReleaseFinder(String $inPath  = null): self
  {
    $finder = self::create();

    $finder->path(['/.*\d{4}\-[0-9a-zA-Z]*/'])
      ->depth(0)
      ->directories();

    if ($inPath) {
      $finder->in($inPath);
    }
    return $finder;
  }

  /**
   * @return array
   */
  public function getAlbumReleases()
  {
    $al = [];
    /** @var SplFileInfo $spl */
    foreach ($this as $spl) {
      $i = new AlbumReleaseDirectory($spl->getPathname());
      $i->isValid();
      $al[] = $i;
    }

    return $al;
  }
}
