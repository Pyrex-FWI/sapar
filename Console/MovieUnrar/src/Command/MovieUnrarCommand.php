<?php

namespace Sapar\Console\MovieUnrar\Command;

use Sapar\Component\SfvChecker\Calculator\SynologyCalculator;
use Sapar\Component\SfvChecker\LocalSfvReader;
use Sapar\Component\SfvChecker\SfvCheckManager;
use Sapar\Console\MovieUnrar\UtilsTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class MovieUnrarCommand
 */
class MovieUnrarCommand extends Command
{
    use UtilsTrait;
    /**
     * @var string
     */
    private $path;

    /**
     * MovieUnrarCommand constructor.
     */
    public function __construct()
    {
        parent::__construct('run');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $movieDirectories = $this->getMovieDirectories($this->path);

        $this->printDetectedMovies($movieDirectories);

        foreach ($movieDirectories as $movieDirectory) {
            if (!$sfvFile = $this->getSfvFile($movieDirectory)) {
                continue;
            }
            $section = $this->output->section();
            $section->writeln(
                sprintf('<comment>>> %s </comment>[<info>CHECKING</info>]', $movieDirectory->getRelativePathname())
            );

            $sfvRChecker = SfvCheckManager::create(new LocalSfvReader(), new SynologyCalculator(), $sfvFile);

            if (!$sfvRChecker->isComplete()) {
                $section->overwrite(
                    sprintf(
                        '<comment>>> %s </comment> [<error>NOT COMPLETE</error>]',
                        $movieDirectory->getRelativePathname()
                    )
                );

                continue;
            }

            $section->overwrite(
                sprintf('<comment>>> %s </comment>[<info>COMPLETE</info>]', $movieDirectory->getRelativePathname())
            );

            $uncompressStatus = $this->uncompress($movieDirectory, $section);

            if ($uncompressStatus) {
                $this->deleteNoVideoFiles($movieDirectory);
            }
        }
    }

    /**
     * @param SplFileInfo[] $movieDirectories
     */
    private function printDetectedMovies($movieDirectories)
    {
        $tablesLines = [];
        foreach ($movieDirectories as $item) {
            $tablesLines[] = [$item->getFilename()];
        }
        $this->sfStyle->table([sprintf('Movies (%d)', count($tablesLines))], $tablesLines);
    }

    /**
     *
     */
    protected function configure()
    {
        $this->addArgument('path', InputArgument::REQUIRED, 'Root path of movie dirs');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->path    = $input->getArgument('path');
        $this->output  = $output;
        $this->input   = $input;
        $this->sfStyle = new SymfonyStyle($input, $output);
        $this->logger  = new ConsoleLogger($output);
    }
}