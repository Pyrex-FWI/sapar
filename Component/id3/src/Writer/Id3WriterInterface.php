<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Writer;

use Sapar\Contract\Id3\Id3MetadataInterface;

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
