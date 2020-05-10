<?php

namespace AudioCoreEntity\Repository;

use AudioCoreEntity\Entity\Genre;
use AudioCoreEntity\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
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
class MediaRepository extends CoreRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Media::class));
    }
    /**
     * @var Genre[]
     */
    private $cachecGenres;

    public function updateMeta(int $getId, ?Id3Metadata $id3)
    {
        /** @var Media $media */
        $media = $this->_em->getReference(Media::class, $getId);
        $media->setArtist($id3->getArtist());
        $media->setTitle($id3->getTitle());
        $media->setYear($id3->getYear());
        $media->setTagged(true);
        $media->setBpm($id3->getBpm());
        if ($genre = $this->getOrCreateNewGenre($id3->getGenre())) {
            $media->setGenre($genre);
        }
        $this->_em->persist($media);
    }

    public function flush()
    {
        $this->_em->flush();
    }

    private function getOrCreateNewGenre(?string $getGenre): ?string
    {
        if (!$getGenre) {
            return null;
        }

        $getGenre = ucwords($getGenre);

        if (!$this->cachecGenres) {
            $_allGenres = (array) $this->_em->getRepository(Genre::class)->findAll();

            foreach ($_allGenres as $item) {
                $_allGenres[$item->getName()] = $item;
            }
        }

        if ($_allGenres[$getGenre] ?? false) {
            /** @var Genre $_allGenres */
            return $_allGenres[$getGenre]->getName();
        }

        $genre = new Genre($getGenre);
        $this->_em->persist($genre);
//        $this->_em->flush();

        return $genre->getName();
    }
}
