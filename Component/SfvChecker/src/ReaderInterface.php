<?php

namespace Sapar\Component\SfvChecker;

/**
 * Interface ReaderInterface
 */
interface ReaderInterface
{
    /**
     * @param string $file
     * @return SfvItem[]|array
     */
    public static function read(string $file): array;
}