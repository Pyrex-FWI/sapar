<?php

namespace Sapar\MessageHandler;

use AudioCoreEntity\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Id3Metadata\Id3MetadataManager;
use Sapar\Message\ReadMediaFilesTag;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ReadMediaFilesTagHandler implements MessageHandlerInterface
{
    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var Id3MetadataManager
     */
    private $id3MetadataManager;

    public function __construct(MediaRepository $mediaRepository, Id3MetadataManager $id3MetadataManager)
    {
        $this->mediaRepository = $mediaRepository;
        $this->id3MetadataManager = $id3MetadataManager;
    }

    public function __invoke(ReadMediaFilesTag $message)
    {
        foreach($message->getMediaFiles() as $media){
            $id3 = $this->id3MetadataManager->read($media->getFilePath());
            $this->mediaRepository->updateMeta($media->getId(), $id3);
        }
    }
}
