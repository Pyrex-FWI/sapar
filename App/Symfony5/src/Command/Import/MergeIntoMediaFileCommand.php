<?php

namespace Sapar\Command\Import;

use AudioCoreEntity\Repository\ImportMediaRepository;
use Sapar\Index\IndexManager;
use Sapar\Repository\ImportMediaFileRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MergeIntoMediaFileCommand extends Command
{
    protected static $defaultName = 'index:merge:mediafile';
    /**
     * @var IndexManager
     */
    private $indexManager;
    /**
     * @var ImportMediaRepository
     */
    private $importMediaFileRepository;

    public function __construct(IndexManager $indexManager, ImportMediaRepository $importMediaFileRepository)
    {
        parent::__construct(self::$defaultName);
        $this->indexManager = $indexManager;
        $this->importMediaFileRepository = $importMediaFileRepository;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $newFilesToAdd = $this->indexManager->countNewFileToImport();

        $io->block(sprintf('%s fichier à importer. (debut)', $newFilesToAdd));
        if ($newFilesToAdd > 0) {
            $this->indexManager->mergeDataIntoMediaFile();
        }

        $io->success(sprintf('%s fichier à importer. (fin)', $this->importMediaFileRepository->count([])));

        return 0;
    }
}
