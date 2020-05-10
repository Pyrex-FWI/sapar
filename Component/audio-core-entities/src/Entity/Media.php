<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Media.
 *
 * @Entity(repositoryClass="AudioCoreEntity\Repository\MediaRepository")
 * @Table(
 *      indexes={@Index(name="provider_filename", columns={"file_name"})},
 *      uniqueConstraints={@UniqueConstraint(name="unique_hash", columns={"hash"})},
 *      options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"}
 * )
 */
class Media
{
    public const MEDIA_TYPE_AUDIO = 1;
    public const MEDIA_TYPE_VIDEO = 2;
    /**
     * @var string
     *
     * @Column(type="string", length=255, nullable=true)
     * @Groups({"media-read"})
     */
    protected $artist;

    /**
     * @var int
     *
     * @Column(type="integer", nullable=true)
     * @Groups({"media-read"})
     */
    protected $bpm;
    /**
     * @var string
     *
     * @Column(type="text", nullable=true, columnDefinition="TEXT not null")
     * @Groups({"media-read"})
     */
    protected $filePath;
    /**
     * @var string
     *
     * @Column(type="string", length=32, nullable=false)
     * @Groups({"media-read"})
     */
    protected $hash;
    /**
     * @var string
     *
     * @Column(type="string", length=200, nullable=true)
     * @Groups({"media-read"})
     */
    protected $dirName;
    /**
     * @var string
     *
     * @Column(type="string", length=255, nullable=true)
     * @Groups({"media-read", "artist-read", "genre-read"})
     */
    protected $title;
    /**
     * @var \DateTime
     *
     * @Column(type="datetime", nullable=true)
     * @Groups({"media-read"})
     */
    protected $releaseDate;
    /**
     * @var string
     *
     * @Column(type="string", length=40, nullable=true)
     * @Groups({"media-read"})
     */
    protected $version;
    /**
     * @var string
     *
     * @Column(type="string", length=255, nullable=true)
     * @Groups({"media-read"})
     */
    protected $fileName;
    /**
     * @var bool
     *
     * @Column(type="boolean", nullable=false, options={"default":false})
     * @Groups({"media-read"})
     */
    protected $exist = false;
    /**
     * @var bool
     *
     * @todo remove property and associated method
     * @Column(type="boolean", nullable=false, options={"default":false})
     * @Groups({"media-read", "genre-read", "artist-read"})
     */
    protected $tagged = false;
    /**
     * @var int
     *
     * @Column(type="integer", nullable=true)
     * @Groups({"media-read"})
     */
    protected $score = 0;
    /**
     * @var \DateTime
     *
     * @Column(type="datetime", nullable=true)
     * @Groups({"media-read"})
     */
    protected $deletedAt;
    /**
     * @var int
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(type="string", length=30, nullable=true)
     * @Groups({"media-read"})
     */
    protected $genre;

    /**
     * @ManyToMany(targetEntity="\AudioCoreEntity\Entity\Genre", inversedBy="medias", cascade={"persist", "detach", "refresh"}, fetch="EXTRA_LAZY")
     * @JoinTable(name="media_genre",
     *      joinColumns={@JoinColumn(name="media_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="genre_id", referencedColumnName="id")}
     *      )
     *
     * @var Collection<int, Genre>
     * @Groups({"media-read"})
     */
    protected $linkedGenres;
    /**
     * @ManyToMany(targetEntity="\AudioCoreEntity\Entity\Artist", inversedBy="medias", cascade={"persist", "detach", "refresh"}, fetch="EXTRA_LAZY")
     * @JoinTable(
     *      joinColumns={@JoinColumn(name="media_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="artist_id", referencedColumnName="id")}
     *      )
     *
     * @var Collection<int, Artist>
     * @Groups({"media-read"})
     */
    protected $artists;
    /**
     * @var int
     *
     * @Column(type="integer", nullable=true)
     * @Groups({"media-read"})
     */
    protected $type;
    /**
     * @var int
     *
     * @Column(type="integer", length=4, nullable=true)
     * @Groups({"media-read", "artist-read", "genre-read"})
     */
    protected $year;

    public function __construct()
    {
        $this->linkedGenres = new ArrayCollection();
        $this->artists      = new ArrayCollection();
    }

    public static function getTypes(): array
    {
        return [
            'audio' => self::MEDIA_TYPE_AUDIO,
            'video' => self::MEDIA_TYPE_VIDEO,
        ];
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
     * Get artist.
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @return $this
     */
    public function setArtist(?string $artist = null)
    {
        if ($artist) {
            $this->artist = substr(trim($artist), 0, 254);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getBpm()
    {
        return $this->bpm;
    }

    /**
     * @param int $bpm
     *
     * @return Media
     */
    public function setBpm($bpm)
    {
        if (filter_var($bpm, FILTER_VALIDATE_INT) || filter_var($bpm, FILTER_VALIDATE_FLOAT)) {
            if ($bpm <= 160 && $bpm >= 60) {
                $this->bpm = abs($bpm);
            }
        }

        return $this;
    }

    public function getExist(): bool
    {
        return $this->exist;
    }

    /**
     * @return $this
     */
    public function setExist(bool $exist): self
    {
        $this->exist = $exist;

        return $this;
    }

    /**
     * Get fullPath.
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set fullPath.
     *
     * @param string $filePath
     *
     * @return Media
     */
    public function setFilePath($filePath)
    {
        $pattern     = '#('.\DIRECTORY_SEPARATOR.')\1+#';
        $replacement = \DIRECTORY_SEPARATOR;
        $filePath    = preg_replace($pattern, $replacement, $filePath);

        $this->filePath = $filePath;

        $this->exist = file_exists($filePath) ? true : true;
        $splFile     = new \SplFileInfo($this->filePath);
        $this->setFileName($splFile->getBasename());
        $this->setHash(md5($this->filePath));
        $paths = explode('/', $splFile->getPath());
        $this->setDirName(''.end($paths));

        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return Media
     */
    public function setHash($hash)
    {
        if (32 === \strlen($hash)) {
            $this->hash = $hash;
        }

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Media
     */
    public function setTitle($title = null)
    {
        if ($title) {
            $this->title = trim($title);
        }

        return $this;
    }

    /**
     * Get type.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param int $type
     *
     * @return Media
     */
    public function setType($type)
    {
        if (!\in_array($type, self::getTypes(), true)) {
            throw new \InvalidArgumentException(sprintf('%s is not a valid type. See %s', $type, self::class.'::getTypes()'));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get releaseDate.
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set releaseDate.
     *
     * @param \DateTime $releaseDate
     *
     * @return Media
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return $this
     */
    public function addGenre(Genre $genre)
    {
        if (!$this->linkedGenres->contains($genre)) {
            $this->linkedGenres->add($genre);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function removeGenre(Genre $genre)
    {
        if ($this->linkedGenres->contains($genre)) {
            $this->linkedGenres->removeElement($genre);
        }

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getLinkedGenres()
    {
        return $this->linkedGenres;
    }

    /**
     * Set Genres.
     *
     * @return $this
     */
    public function setLinkedGenres(ArrayCollection $linkedGenres)
    {
        $this->linkedGenres = $linkedGenres;

        return $this;
    }

    /**
     * @return $this
     */
    public function addArtist(Artist $artist)
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function removeArtist(Artist $artist)
    {
        if ($this->artists->contains($artist)) {
            $this->artists->removeElement($artist);
        }

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists()
    {
        return $this->artists;
    }

    /**
     * @return $this
     */
    public function setArtists(ArrayCollection $artists)
    {
        $this->artists = $artists;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set version.
     *
     * @param string $version
     *
     * @return Media
     */
    public function setVersion($version)
    {
        $this->version = trim($version);

        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     *
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return Media
     */
    public function setScore(int $score)
    {
        if (filter_var($score, FILTER_VALIDATE_INT) || filter_var($score, FILTER_VALIDATE_FLOAT)) {
            $this->score = $score;
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     *
     * @return Media
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirName()
    {
        return $this->dirName;
    }

    /**
     * @param string $dirName
     *
     * @return Media
     */
    public function setDirName($dirName)
    {
        $this->dirName = $dirName;

        return $this;
    }

    public function isUntaged(): bool
    {
        // @codeCoverageIgnoreStart
        return !$this->tagged;
        // @codeCoverageIgnoreEnd
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     *
     * @return Media
     */
    public function setYear($year = null)
    {
        if ($year && preg_match('/\d{4}/', (string) $year)) {
            $this->year = $year;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function getTagged()
    {
        // @codeCoverageIgnoreStart
        return $this->tagged;
        // @codeCoverageIgnoreEnd
    }

    /**
     * @param bool $tagged
     *
     * @return Media
     */
    public function setTagged($tagged)
    {
        // @codeCoverageIgnoreStart
        $this->tagged = $tagged;

        return $this;
        // @codeCoverageIgnoreEnd
    }

    /**
     * @return string
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}
