<?php

namespace Sapar\Component\Id3\Reader;

use Sapar\Component\Id3\Metadata\Id3MetadataInterface;

/**
 * Interface Id3ReaderInterface.
 */
interface Id3ReaderInterface
{
    public function read(Id3MetadataInterface $id3Metadata): bool;

    public function supportRead(Id3MetadataInterface $id3Metadata): bool;

    public function getSupportedExtensionsForRead(): array;
}
