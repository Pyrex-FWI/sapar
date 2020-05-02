<?php

namespace Sapar\Command;

use AudioCoreEntity\Entity\ImportMedia;
use Sapar\Index\IndexManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TruncateMediaCommand extends Command
{
    protected static $defaultName = 'index:truncate:import-table';
    /**
     * @var IndexManager
     */
    private $indexManager;

    public function __construct(IndexManager $indexManager)
    {
        parent::__construct(self::$defaultName);
        $this->indexManager = $indexManager;
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
        $this->indexManager->truncate(ImportMedia::class);

        return 0;
    }
}
