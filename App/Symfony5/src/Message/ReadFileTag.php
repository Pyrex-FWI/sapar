<?php

namespace Sapar\Message;

final class ReadFileTag
{

     private $mediaFilePath;

     public function __construct(string $mediaFilePath)
     {
         $this->mediaFilePath = $mediaFilePath;
     }

    public function getMediaFilePath(): string
    {
        return $this->mediaFilePath;
    }
}
