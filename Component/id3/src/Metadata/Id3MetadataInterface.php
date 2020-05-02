<?php

namespace Sapar\Component\Id3\Metadata;

/**
 * Interface Id3MetadataInterface.
 */
interface Id3MetadataInterface
{
    public function getFile(): \SplFileInfo;

    public function getTitle(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setTitle(?string $title);

    public function getArtist(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setArtist(?string $artist);

    /**
     * @return string
     */
    public function getAlbum(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setAlbum(?string $album);

    public function getAllArtists(): array;

    /**
     * @return Id3MetadataInterface
     */
    public function setAllArtists(array $artists);

    public function getGenre(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setGenre(?string $genre);

    public function getAllGenres(): array;

    /**
     * @return Id3MetadataInterface
     */
    public function setAllGenres(array $genres);

    public function getComment(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setComment(?string $comment);

    public function getYear(): ?int;

    /**
     * @return Id3MetadataInterface
     */
    public function setYear(?int $year);

    public function getKey(): ?string;

    /**
     * @return Id3MetadataInterface
     */
    public function setKey(?string $key);

    public function getBpm(): ?float;

    /**
     * @return Id3MetadataInterface
     */
    public function setBpm(?float $bpm);

    /**
     * Time in seconds.
     */
    public function getTimeDuration(): ?float;

    /**
     * @return Id3MetadataInterface
     */
    public function setTimeDuration(?float $time);

    /**
     * @return Id3MetadataInterface
     */
    public function setReader(?string $reader);

    /**
     * @return string
     */
    public function getReader(): ?string;
}
