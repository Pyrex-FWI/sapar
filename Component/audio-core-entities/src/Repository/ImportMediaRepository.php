<?php

declare(strict_types=1);

namespace AudioCoreEntity\Repository;

use AudioCoreEntity\Entity\ImportMedia;
use AudioCoreEntity\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method ImportMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImportMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImportMedia[]    findAll()
 * @method ImportMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImportMediaRepository extends CoreRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(ImportMedia::class));
    }

    /**
     * @return int|mixed|string
     */
    public function removeDuplicates()
    {
        $query = $this->createQueryBuilder('im');

        return $query
            ->delete()
            ->where($query->expr()->in(
                'im.hash',
                $this->_em->createQueryBuilder('m')
                    ->select('m.hash')
                    ->from(Media::class, 'm')
//                    ->setMaxResults(1000) #Iterrate for optimize?
                    ->getDQL()
            ))
            ->getQuery()->execute();
    }

    public function countNewFilesToImport(): int
    {
        $allNewIndexCount         = $this->count([]);
        $alreadyExistInMediaCount = $this->countExistingFileInMedias();

        return $allNewIndexCount - $alreadyExistInMediaCount;
    }

    public function countExistingFileInMedias(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->leftJoin(Media::class, 'media', Join::WITH, 'media.hash = i.hash')
            ->andWhere('media.hash IS NOT NULL')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Media
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
