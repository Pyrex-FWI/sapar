<?php


namespace Sapar\Index;

use Sapar\Component\AudioCoreEntity\Entity\ImportMedia;
use Sapar\Component\AudioCoreEntity\Entity\Media;
use Sapar\Component\AudioCoreEntity\Repository\ImportMediaRepository;
use Sapar\Component\AudioCoreEntity\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Sapar\Message\ReadMediaFilesTag;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class IndexManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var \Doctrine\Persistence\ObjectRepository|MediaRepository
     */
    private $mediaRepository;
    /**
     * @var ImportMediaRepository
     */
    private $importMediaFileRepository;
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(EntityManagerInterface $entityManager, MessageBusInterface $bus)
    {
        $this->entityManager = $entityManager;
        $this->mediaRepository = $entityManager->getRepository(Media::class);
        /** @var ImportMediaRepository importMediaFileRepository */
        $this->importMediaFileRepository = $entityManager->getRepository(ImportMedia::class);
        $this->bus = $bus;
    }

    public function importMedia(String $filePath)
    {
        $file = new \SplFileObject($filePath);
        foreach ($file as $line_num => $line) {
            if ($line == "") continue;

            $line = rtrim($line);
            $data = (new ImportMedia())
                ->setFilePath($line)
                ->setHash(\md5($line))
            ;
            $this->entityManager->persist($data);
        }
        $this->entityManager->flush();
    }

    public function truncate($entityClass): void
    {
        $cmd = $this->entityManager->getClassMetadata($entityClass);
        $connection = $this->entityManager->getConnection();
        $dbPlatform = $connection->getDatabasePlatform();
        $connection->beginTransaction();
        $this->setForeignKeyChecks($connection, true);
        $q = $dbPlatform->getTruncateTableSql($cmd->getTableName());
        $connection->executeUpdate($q);
        $this->setForeignKeyChecks($connection, false);
        $connection->commit();
    }

    /**
     * @param \Doctrine\DBAL\Connection $connection
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function setForeignKeyChecks(\Doctrine\DBAL\Connection $connection, bool $value): void
    {
        $query = sprintf('SET FOREIGN_KEY_CHECKS=%s', (int) $value);
        if ($connection->getDatabasePlatform()->getName() === 'sqlite' ) {
            $query = sprintf('PRAGMA foreign_keys = %s', ($value === true ? 'ON' : 'OFF'));
        }
        $connection->query($query);
    }

    public function countNewFileToImport(): int
    {
        /** @var ImportMediaRepository $mediaRepository */
        $importRepository = $this->entityManager->getRepository(ImportMedia::class);

        return $importRepository->countNewFilesToImport();
    }

    public function mergeDataIntoMediaFile()
    {
        $this->importMediaFileRepository->removeDuplicates();
        if ($this->importMediaFileRepository->count([]) > 0) {
            //Todo ->Adapt for mysql engine
            $this->entityManager->getConnection()->exec(
                sprintf(
                    'INSERT INTO %s (hash, file_path) SELECT hash, file_path FROM %s',
                    $this->entityManager->getClassMetadata(Media::class)->getTableName(),
                    $this->entityManager->getClassMetadata(ImportMedia::class)->getTableName()
                )
            );
            //run event manualy for elastic index
            $this->importMediaFileRepository->removeDuplicates();
        }
    }

    public function updateMetadata(SymfonyStyle $symfonyStyle = null)
    {
        $count = $this->entityManager->getRepository(Media::class)->count(['tagged' => false]);
        /** @var QueryBuilder $qb */
        $qb = $this->entityManager->getRepository(Media::class)->createQueryBuilder('m');
        $limit = $count < 100 ? $count : 100;
        $progress = $symfonyStyle->createProgressBar($count);
        $progress->setFormat('very_verbose');
//        $symfonyStyle->progressStart($count);

        foreach(range(0, $count, $limit) as $from) {
            $mediafiles = $qb
                ->where('m.tagged = 0')
                ->setFirstResult($from)
                ->setMaxResults($limit)
                ->getQuery()->execute()
                ;
            $this->bus->dispatch(new ReadMediaFilesTag($mediafiles));
//            $symfonyStyle->progressAdvance($limit);
            $progress->advance($limit);
            $this->entityManager->clear();
        }
//        $symfonyStyle->progressFinish();
        $progress->finish();
    }
}