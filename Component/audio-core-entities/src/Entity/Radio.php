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
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Radio.
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("name")
 */
class Radio
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @todo refactor in favour of hitPagesUrls
     *
     * @var ArrayCollection
     *
     * @ORM\Column(name="hitPages", type="json_array")
     */
    private $hitPagesUrls;

    public function __construct()
    {
        $this->hitPagesUrls = new ArrayCollection();
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
     * @return Radio
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
     * @return $this
     */
    public function setHitPagesUrls(array $hitPagesUrls)
    {
        foreach ($hitPagesUrls as $hitPage) {
            if (filter_var($hitPage, FILTER_VALIDATE_URL)) {
                $this->hitPagesUrls->add($hitPage);
            }
        }

        return $this;
    }

    /**
     * Get hitPages.
     *
     * @return ArrayCollection
     */
    public function getHitPagesUrls()
    {
        return $this->hitPagesUrls;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
