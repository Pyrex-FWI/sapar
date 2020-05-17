<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 08/02/2019
 * Time: 22:36
 */

namespace Sapar\Console\ReleaseDispatcher\Tests\Command;

use Sapar\Console\ReleaseDispatcher\Command\ReleaseDispatcherInitCommand;
use Sapar\Console\ReleaseDispatcher\Config\Configuration;
use PHPUnit\Framework\TestCase;
use Sapar\Console\ReleaseDispatcher\Tests\AlbumReleaseDirectoryTrait;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ReleaseDispatcherInitCommandTest extends TestCase
{
  use AlbumReleaseDirectoryTrait;

  private $root;


  protected function setUp()
  {
    $this->generateDirectories();
    $cfgFile = Configuration::getCwdConfigFilePath();
    self::moveFileIfExist($cfgFile, $cfgFile.'.back');
  }
  /**
   *
   */
  public function testInitCommand()
  {
    $application = new Application('test');
    $application->add(new ReleaseDispatcherInitCommand('init'));

    $command       = $application->find('init');
    $commandTester = new CommandTester($command);
    $commandTester->execute([
      'command'  => $command->getName()
    ]);
    // the output of the command in the console
    $output = $commandTester->getDisplay();
    $this->assertContains('[OK] Default configuration was successfully created', $output);
    $commandTester->execute(
      [
        'command'  => $command->getName()
      ]
    );
    $output = $commandTester->getDisplay();
    $this->assertContains('[NOTE] release configuration already exist', $output);

  }

  protected function tearDown()
  {
    $cfgFile = Configuration::getCwdConfigFilePath();
    unlink($cfgFile);
    self::moveFileIfExist($cfgFile.'.back', $cfgFile);
  }


}
