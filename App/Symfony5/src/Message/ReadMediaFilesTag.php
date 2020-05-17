<?php

namespace Sapar\Message;

use Sapar\Component\AudioCoreEntity\Entity\Media;

final class ReadMediaFilesTag
{

    /** @var Media[] */
     private $mediaFiles;

     public function __construct(array $mediaFilePath)
     {
         $this->mediaFiles = $mediaFilePath;
     }

    public function getMediaFiles(): array
    {
        return $this->mediaFiles;
    }
}
