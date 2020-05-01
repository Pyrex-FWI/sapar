<?php

namespace Sapar\Component\SfvChecker;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Exception\InvalidArgumentException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class LocalSfvReader
 */
class LocalSfvReader implements ReaderInterface
{
    /**
     * @param \SplFileInfo $fileInfo
     * @return array
     */
    public static function read(string $file): array
    {
        $fileInfo = new \SplFileInfo($file);

        $fs = new Filesystem();
        if (!$fs->exists($fileInfo->getPathname())) {
            throw new FileNotFoundException($fileInfo->getPathname());
        }

        if ($fileInfo->getExtension() !== 'sfv') {
            throw new InvalidArgumentException(sprintf('Provide a file with .sfv extension instead of %s', $fileInfo->getFilename()));
        }

        $contentLines = array_map('trim', explode(PHP_EOL, file_get_contents($fileInfo->getPathname())));
        $collection = [];

        foreach ($contentLines as $item) {
            if (strlen($item) == 0) {
                continue;
            }
            if (strlen($item[0]) == ";") {
                continue;
            }

            list($fileName, $hash) = explode(' ', $item);
            $collection[$fileInfo->getPath() . '/' . $fileName] = new SfvItem($fileInfo->getPath() . '/' . $fileName, strtolower($hash));
        }

        return $collection;
    }
}