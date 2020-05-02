<?php

namespace Sapar\Console\ReleaseDispatcher\Command;

use Sapar\Console\ReleaseDispatcher\AlbumReleaseDirectory;
use Sapar\Console\ReleaseDispatcher\Config\Configuration;
use Sapar\Console\ReleaseDispatcher\Dispatcher;
use Sapar\Console\ReleaseDispatcher\SaparFinder\SaparFinder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class ReleaseDispatcherCommand
 */
class ReleaseDispatcherCommand extends Command
{
  /** @var string */
    private $target;
  /** @var string */
    private $format;
  /** @var string */
    private $sourcePath;

    /**
     * {@inheritdoc}
     */
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
    }

  /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $configFile = Configuration::getCwdConfigFilePath();
        Configuration::getConfig(getenv('RELEASE_CONFIG_FILE')? : $configFile);
        $target     = Configuration::getDispatchTarget();
        $sourcePath = Configuration::getDispatchTarget();

        $this->addOption(
            'target',
            't',
            InputOption::VALUE_REQUIRED,
            'Target path to dispatch releases',
            $target
        );
        $this->addOption(
            'from',
            'f',
            InputOption::VALUE_REQUIRED,
            'Release directorie path',
            $sourcePath
        );
        $this->addOption(
            'dry-run',
            null,
            InputOption::VALUE_NONE,
            'DryRun mode'
        );
    }

    /** {@inheritdoc} */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $configFile = Configuration::getCwdConfigFilePath();
        Configuration::getConfig($configFile);
        $targetPath = $input->getOption('target');
        $sourcePath = $input->getOption('from');
        if (!is_dir($targetPath)) {
            throw new InvalidArgumentException(sprintf('target arg \'%s\' is not a valid directory', $targetPath));
        }

        $this->target     = $targetPath;
        $this->sourcePath = $sourcePath;
        $this->format     = Configuration::getDispatchFormat();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $sfStyle    = new SymfonyStyle($input, $output);
      $dispatcher = new Dispatcher($this->format, $this->target);
      $finder     = SaparFinder::createAlbumReleaseFinder($this->sourcePath);

      $diectories = $finder->count();
      /** @var SplFileInfo $item */
      foreach ($finder as $item) {
        $albumReleaseDirectory = new AlbumReleaseDirectory($item->getPathName());

        // @codeCoverageIgnoreStart
        if (!$albumReleaseDirectory->isValid()) {
            continue;
        }
        // @codeCoverageIgnoreEnd

        $sfStyle->writeln($dispatcher->dryRunMove($albumReleaseDirectory));

        // @codeCoverageIgnoreStart
        if ($input->getOption('dry-run')) {
          continue;
        }
        // @codeCoverageIgnoreEnd

        $dispatcher->move($albumReleaseDirectory);
      }
      $sfStyle->success(sprintf('%s directorie(s) has moved', $diectories));
  }

}
