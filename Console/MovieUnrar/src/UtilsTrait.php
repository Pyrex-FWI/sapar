<?php

namespace Sapar\Console\MovieUnrar;

use Sapar\Component\SfvChecker\Calculator\SynologyCalculator;
use Sapar\Component\SfvChecker\LocalSfvReader;
use Sapar\Component\SfvChecker\SfvCheckManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\ConsoleSectionOutput;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Trait UtilsTrait
 *
 * @package Sapar\Console\MovieUnrar
 */
trait UtilsTrait
{
    /** @var ConsoleLogger */
    private $logger;
    /**
     * @var ConsoleOutputInterface
     */
    private $output;
    /**
     * @var InputInterface
     */
    private $input;
    /**
     * @var SymfonyStyle
     */
    private $sfStyle;

    /**
     * Retrieve movie directories
     *
     * @param string $path
     * @param string $name
     * @return \Iterator|SplFileInfo[]
     */
    public function getMovieDirectories($path, $name = '/\.\d{4}\./')
    {
        $movieDirectories = new Finder();
        $movieDirectories = $movieDirectories->name($name)
                                             ->in($path)
                                             ->depth(0)
                                             ->directories()
                                             ->sortByName()
                                             ->filter(
                                                 function (SplFileInfo $splFileInfo) {
                                                     $files = Finder::create()
                                                                    ->in($splFileInfo->getPathname())
                                                                    ->depth(0)
                                                                    ->name(['*.mkv'])
                                                                    ->files()
                                                                    ->sortByName();
                                                     return $files->count() == 0;
                                                 }
                                             );
        $directories      = $movieDirectories->getIterator();

        return $directories;
    }

    /**
     * @param SplFileInfo[] $movieDirectories
     * @return SplFileInfo[]
     */
    protected function getMoviesToUnrar($movieDirectories)
    {
        $moviesToUnrar = [];

        foreach ($movieDirectories as $movieDirectory) {
            if (!$sfvFile = $this->getSfvFile($movieDirectory)) {
                continue;
            }
            $sfvRChecker = SfvCheckManager::create(new LocalSfvReader(), new SynologyCalculator(), $sfvFile);

            if (!$sfvRChecker->isCheckable()) {
                continue;
            }

            $moviesToUnrar[] = $movieDirectory;
        }

        return $moviesToUnrar;
    }

    /**
     * @param SplFileInfo $movieDirectory
     * @return SplFileInfo
     */
    protected function getSfvFile(SplFileInfo $movieDirectory)
    : ?SplFileInfo
    {
        $finder = (new Finder())->in($movieDirectory->getPathname())
                                ->name('*.sfv')
                                ->files();

        if ($finder->count() === 0) {
            return null;
        }

        $a = array_values(iterator_to_array($finder->getIterator()));
        /** @var SplFileInfo $sfvFile */
        $sfvFile = $a[0];

        return $sfvFile;
    }

    /**
     * @param SplFileInfo $movieDirectory
     */
    private function deleteNoVideoFiles(SplFileInfo $movieDirectory)
    {
        $rar = Finder::create()
                     ->in($movieDirectory->getPathname())
                     ->name(['*.rar', '/.*r\d{1,3}$/', '*.sfv', '*.nfo'])
                     ->files()
                     ->sortByName();
        $fs  = new Filesystem();
        foreach ($rar->getIterator() as $k => $fileInfo) {
            $fs->remove($k);
        }
    }

    /**
     * @param SplFileInfo $movieDirectory
     * @param ConsoleSectionOutput $section
     * @return bool
     */
    private function unCompress(SplFileInfo $movieDirectory, ConsoleSectionOutput $section)
    : bool
    {
        $answer  = 'y';
        $rarFile = $this->getFirstRarFile($movieDirectory);

        if ($this->input->isInteractive()) {
            $answer = $this->sfStyle->askQuestion(
                new Question(sprintf('Do you want decompress %s (y/n)?', $movieDirectory->getRelativePathname()), 'n')
            );
        }

        if (!$this->input->isInteractive() || 'y' === $answer) {
            $process = SynologyUnrarer::extract($rarFile, $movieDirectory->getPathname());
            $section->overwrite(
                sprintf(
                    '<comment>>> %s </comment>[<fg=black;bg=green>DECOMPRESSED!</>]',
                    $movieDirectory->getRelativePathname()
                )
            );

            return $process->isSuccessful() ? true : false;
        }

        return false;
    }

    /**
     * @param SplFileInfo $movieDirectory
     * @return string
     */
    private function getFirstRarFile(SplFileInfo $movieDirectory)
    {
        /** @var Finder $rar */
        $rar = Finder::create()
                     ->in($movieDirectory->getPathname())
                     ->name('*.rar')
                     ->files();
        $rar = array_values(iterator_to_array($rar->getIterator()))[0];

        return $rar;
    }
}