<?php

namespace Sapar\Component\SfvChecker\Calculator;

interface CalculatorInterface
{
    /**
     * @param string $filePath
     * @return string
     */
    public function getHash($filePath): string;
}