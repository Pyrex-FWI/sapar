<?php

namespace Sapar\Component\SfvChecker\Calculator;

/**
 * Class PhpCalculator
 */
class PhpCalculator implements CalculatorInterface
{
    /**
     * @param string $filePathName
     * @return string
     */
    public function getHash($filePathName): string
    {
        if (!file_exists($filePathName)) {
            return '';
        }

        return strtolower(hash_file('crc32b', $filePathName));
    }
}