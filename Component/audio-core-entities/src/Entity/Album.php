<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Album.
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Album
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @todo set url instead blob data
     *
     * @var string
     *
     * @ORM\Column(name="cover", type="blob")
     */
    private $cover;

    public function __construct(?string $name = null)
    {
        if ($name) {
            $this->setName($name);
        }
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
     * Set name.
     *
     * @param string $name
     *
     * @return Album
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cover.
     *
     * @param string $cover
     *
     * @return Album
     */
    public function setCover($cover)
    {
        // @codeCoverageIgnoreStart
        $this->cover = $cover;

        return $this;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Get cover.
     *
     * @return string
     */
    public function getCover()
    {
        // @codeCoverageIgnoreStart
        return $this->cover;
        // @codeCoverageIgnoreEnd
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
