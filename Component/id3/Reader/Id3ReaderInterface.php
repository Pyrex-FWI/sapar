<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Reader;

use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * Interface Id3ReaderInterface.
 */
interface Id3ReaderInterface
{
    public function read(Id3MetadataInterface $id3Metadata): bool;

    public function supportRead(Id3MetadataInterface $id3Metadata): bool;

    public function getSupportedExtensionsForRead(): array;
}
