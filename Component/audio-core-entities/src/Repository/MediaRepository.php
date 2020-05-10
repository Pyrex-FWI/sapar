<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace AudioCoreEntity\Repository;

use AudioCoreEntity\Entity\Genre;
use AudioCoreEntity\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * MediaRepository.
 *
 * @psalm-suppress LessSpecificImplementedReturnType
 * @psalm-suppress ImplementedReturnTypeMismatch
 *
 * @method Media|null   find($id, $lockMode = null, $lockVersion = null)
 * @method Media|null   findOneBy(array $criteria, array $orderBy = null)
 * @method Media[]|null findAll()
 * @method Media[]|null findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @property EntityManagerInterface $_em
 */
class MediaRepository extends CoreRepository
{
    /**
     * @var Genre[]
     */
    private $cachecGenres;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Media::class));
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @psalm-suppress PossiblyNullReference
     */
    public function updateMeta(int $getId, ?Id3MetadataInterface $id3): void
    {
        /** @var Media $media */
        $media = $this->_em->getReference(Media::class, $getId);
        $media->setArtist($id3->getArtist());
        $media->setTitle($id3->getTitle());
        $media->setYear($id3->getYear());
        $media->setTagged(true);
        $media->setBpm((int) $id3->getBpm());
        if ($genre = $this->getOrCreateNewGenre($id3->getGenre())) {
            $media->setGenre($genre);
        }
        $this->_em->persist($media);
    }

    public function flush(): void
    {
        $this->_em->flush();
    }

    private function getOrCreateNewGenre(?string $getGenre): ?string
    {
        if (!$getGenre) {
            return null;
        }

        $getGenre  = ucwords($getGenre);
        $allGenres = [];

        if (!$this->cachecGenres) {
            /** @var Genre[] $allGenres */
            $allGenres = (array) $this->_em->getRepository(Genre::class)->findAll();

            foreach ($allGenres as $item) {
                $allGenres[$item->getName()] = $item;
            }
        }

        if ($allGenres[$getGenre] ?? false) {
            // @var Genre $allGenres
            return $allGenres[$getGenre]->getName();
        }

        $genre = new Genre($getGenre);
        $this->_em->persist($genre);
//        $this->_em->flush();

        return $genre->getName();
    }
}
