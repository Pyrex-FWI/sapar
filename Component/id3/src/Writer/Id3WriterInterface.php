<?php

namespace Sapar\Component\Id3\Writer;

use Sapar\Component\Id3\Metadata\Id3MetadataInterface;

/**
 * Interface Id3WriterInterface.
 */
interface Id3WriterInterface
{
    /**
     * @return bool
     */
    public function write(Id3MetadataInterface $id3Metadata);

    /**
     * @return bool
     */
    public function supportWrite(Id3MetadataInterface $id3Metadata);

    /**
     * @return array
     */
    public function getSupportedExtensionsForWrite();
}
