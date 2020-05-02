<?php

namespace Sapar\Component\Id3\Metadata;

class Id3Metadata extends Id3MetadataBase implements \JsonSerializable, \Serializable
{
    /**
     * Specify data which should be serialized to JSON.
     *
     * @see http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource
     *
     * @since 5.4.0
     */
    public function serialize()
    {
        return serialize($this->toArray());
    }

    /**
     * Constructs the object.
     *
     * @see  http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $serialized = unserialize($serialized);

        foreach ((array) $serialized as $key => $value) {
            if ('_' == $key[0]) {
                $key = substr($key, 1);
            }

            if (!property_exists(self::class, $key)) {
                continue; // @codeCoverageIgnore
            }

            if ('file' == $key) {
                $this->file = new \SplFileInfo($value);
                continue;
            }

            $this->{$key} = $value;
        }
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @see  http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource
     *
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    protected function toArray(): array
    {
        return [
            'file'      => $this->file->getRealPath(),
            'album'     => $this->getAlbum(),
            'title'     => $this->getTitle(),
            'artist'    => $this->getArtist(),
            'artists'   => $this->getAllArtists(),
            'genre'     => $this->getGenre(),
            'genres'    => $this->getAllGenres(),
            'comment'   => $this->getComment(),
            'year'      => $this->getYear(),
            'key'       => $this->getKey(),
            'bpm'       => $this->getBpm(),
            'duration'  => $this->getTimeDuration(),
            '_reader'   => $this->getReader(),
            '_readCmd'  => $this->getReadCmd(),
            '_execTime' => $this->getExecTime(),
        ];
    }
}
