<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 08/02/2019
 * Time: 22:36
 */

namespace Sapar\Console\ReleaseDispatcher\Tests\Command;

use Sapar\Console\ReleaseDispatcher\Command\ReleaseDispatcherCommand;
use PHPUnit\Framework\TestCase;
use Sapar\Console\ReleaseDispatcher\Config\Configuration;
use Sapar\Console\ReleaseDispatcher\Tests\AlbumReleaseDirectoryTrait;
use Sapar\Console\ReleaseDispatcher\Tests\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\VarDumper\VarDumper;

class ReleaseDispatcherCommandTest extends TestCase
{
  use AlbumReleaseDirectoryTrait;

  private $root;

  public static function commandTesterProvider()
  {
    $application = new Application('test');
    $application->add(new ReleaseDispatcherCommand('run'));

    $command       = $application->find('run');

    return new CommandTester($command);
  }


  protected function setUp()
  {
    $this->generateDirectories();
  }

  /**
   * @test
   * @throws \Exception
   */
  public function checkConfig()
  {
    $this->expectException(\Exception::class);
    Configuration::checkConfig();
  }

  /**
   *
   */
  public function testRunErrorCommand()
  {
    $this->expectException(\Symfony\Component\Console\Exception\InvalidArgumentException::class);
    $commandTester = self::commandTesterProvider();

    $commandTester->execute(
      [
        'command'  => 'run',
        '-f'       => 'vfs://' . Test::VFS_SAPAR_NAS,
        '-t'       => 'vfs://NotExist' . Test::VFS_SAPAR_NAS
      ]
    );
    $output = $commandTester->getDisplay();
  }

  public function testRunCommand()
  {
    $commandTester = self::commandTesterProvider();

    $commandTester->execute(
      [
        'command'  => 'run',
        '-f'       => 'vfs://' . Test::VFS_SAPAR_NAS,
        '-t'       => 'vfs://' . Test::VFS_SAPAR_NAS
      ]
    );
    $output = $commandTester->getDisplay();
    $this->assertContains('[OK] 626 directorie(s) has moved', $output);
  }

}
