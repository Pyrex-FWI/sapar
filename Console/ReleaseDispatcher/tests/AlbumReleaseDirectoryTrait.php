<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 10/02/2019
 * Time: 15:52
 */

namespace Sapar\Console\ReleaseDispatcher\Tests;

use org\bovigo\vfs\vfsStream;

trait AlbumReleaseDirectoryTrait
{
  /**
     * @return \Generator
     */
    private function getDirectories()
    {
        $DirectoriesContent = base64_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'sample_directories.txt'));
        foreach (explode(PHP_EOL, $DirectoriesContent) as $line) {
            if ($line) {
                yield trim($line);
            }
        }
    }

  /**
   * Return path where directories was created
   * @return string
   */
    private function generateDirectories()
    {
        $this->root = vfsStream::setup(Test::VFS_SAPAR_NAS);
        foreach ($this->getDirectories() as $nameDirectory) {
            $d = vfsStream::newDirectory($nameDirectory)->at($this->root);
        }

      return vfsStream::url(Test::VFS_SAPAR_NAS);
    }

  /**
   * @param string $cfgFile
   * @param string $newName
   */
  static function moveFileIfExist(string $cfgFile, string $newName): void
  {
    if (file_exists($cfgFile)) {
      rename($cfgFile, $newName);
    }
  }
}
