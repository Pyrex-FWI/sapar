<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Metadata;

use Sapar\Contract\Id3\Id3MetadataInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Class Id3MetadataBase.
 */
abstract class Id3MetadataBase implements Id3MetadataInterface
{
    /**
     * @var \SplFileInfo
     */
    protected $file;

    /**
     * @var string
     */
    protected $album;

    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $artist;
    /**
     * @var array
     */
    protected $artists = [];
    /**
     * @var string
     */
    protected $genre;
    /**
     * @var array
     */
    protected $genres = [];
    /**
     * @var string
     */
    protected $comment;
    /**
     * @var string
     */
    protected $reader;
    /**
     * @var string
     */
    protected $readCmd;
    /**
     * @var int
     */
    protected $execTime;
    /**
     * @var int
     */
    protected $year;
    /**
     * @var string
     */
    protected $key;
    /**
     * @var int
     */
    protected $bpm;
    /**
     * @var int
     */
    protected $duration;

    /**
     * Id3MetadataBase constructor.
     *
     * @param string $file
     *
     * @throws FileNotFoundException
     */
    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new FileNotFoundException(sprintf('%s not exist', $file));
        }
        $this->file = new  \SplFileInfo($file);
    }

    final public function getFile(): \SplFileInfo
    {
        return $this->file;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return Id3MetadataBase
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    /**
     * @return Id3MetadataBase
     */
    public function setArtist(?string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getAllArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param array $artists
     */
    public function setAllArtists($artists): self
    {
        $this->artists = $artists;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAllGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param array $genres
     */
    public function setAllGenres($genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getBpm(): ?float
    {
        return $this->bpm;
    }

    /**
     * @param int $bpm
     */
    public function setBpm(?float $bpm): self
    {
        $this->bpm = $bpm;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->album;
    }

    /**
     * @param string $album
     */
    public function setAlbum(?string $album): self
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Time in seconds.
     */
    public function getTimeDuration(): ?float
    {
        return $this->duration;
    }

    /**
     * @param float $time
     */
    public function setTimeDuration(?float $time): self
    {
        $this->duration = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getReader(): ?string
    {
        return $this->reader;
    }

    /**
     * @param string $reader
     */
    public function setReader(?string $reader): self
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * @return int
     */
    public function getExecTime(): ?int
    {
        return $this->execTime;
    }

    public function setExecTime(int $execTime): self
    {
        $this->execTime = $execTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getReadCmd(): ?string
    {
        return $this->readCmd;
    }

    public function setReadCmd(string $readCmd): self
    {
        $this->readCmd = $readCmd;

        return $this;
    }

    /**
     * @param $bpm
     */
    protected static function floatCast($bpm): ?float
    {
        if (null === $bpm) {
            return null; //@codeCoverageIgnore
        }

        return (float) (($bpm));
    }
}
