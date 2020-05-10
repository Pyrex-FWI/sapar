<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Artist.
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="artist_name_idx", columns={"name"})})
 * @ORM\Entity
 */
class Artist
{
    use TimestampableEntity;

    /**
     * @var string
     * @Gedmo\Slug(fields={"name"}, unique=true)
     * @ORM\Column(type="string", length=128, unique=true)
     */
    protected $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     * @Groups({"artist-read", "media-read"})
     */
    private $name;
    /**
     * @ORM\ManyToMany(targetEntity="\AudioCoreEntity\Entity\Media",mappedBy="artists")
     * @Groups({"artist-read"})
     */
    private $medias;

    /**
     * Artist constructor.
     *
     * @param null $name
     */
    public function __construct($name = null)
    {
        if ($name) {
            $this->setName($name);
        }
        $this->medias = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param mixed $medias
     *
     * @return Artist
     */
    public function setMedias($medias)
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
