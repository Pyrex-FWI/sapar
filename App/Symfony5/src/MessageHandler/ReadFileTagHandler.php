<?php

namespace Sapar\MessageHandler;

use Sapar\Message\ReadFileTag;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class ReadFileTagHandler
 * @package Sapar\MessageHandler
 * @deprecated
 */
final class ReadFileTagHandler implements MessageHandlerInterface
{
    public function __invoke(ReadFileTag $message)
    {
        dump($message->getMediaFilePath());
    }
}
