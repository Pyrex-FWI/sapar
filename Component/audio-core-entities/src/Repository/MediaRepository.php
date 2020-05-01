<?php

namespace AudioCoreEntity\Repository;

use AudioCoreEntity\Entity\Media;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sapar\Component\Id3\Metadata\Id3Metadata;

/**
 * MediaRepository
 *
 * @method MediaRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaRepository[]    findAll()
 * @method MediaRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @property EntityManagerInterface   $_em
 */
class MediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media::class);
    }

    public function updateMeta(int $getId, ?Id3Metadata $id3)
    {
        /** @var Media $media */
        $media = $this->_em->getReference(Media::class, $getId);
        $media->setArtist($id3->getArtist());
        $media->setTitle($id3->getTitle());
        $media->setYear($id3->getYear());
        $media->setTagged(true);
        $media->setBpm($id3->getBpm());
//        $media->setGenres($id3->getGenre());
//        dump($media);
        $this->_em->persist($media);
        $this->_em->flush();
    }
}
