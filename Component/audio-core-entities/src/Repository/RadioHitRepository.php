<?php

namespace AudioCoreEntity\Repository;

use AudioCoreEntity\Entity\RadioHit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * RadioHitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RadioHitRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagerRegistry::class);
    }
    /**
     * @param $minSimilarity
     * @param $artist
     * @param $title
     * @return RadioHit[]
     */
    public function getSimilar($artist, $title, $minSimilarity = 51)
    {
        $query = $this->_em->createQuery('SELECT r FROM RadioHit r WHERE LEVENSHTEIN_RATIO(CONCAT(r.artist, \' \', title), :artistTitle) > :minSimilarity');
        $query->setParameter('artistTitle', sprintf('%s %s', $artist, $title));
        $query->setParameter('minSimilarity', $minSimilarity);

        return $query->getResult();
    }
}
