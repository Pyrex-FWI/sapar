<?php

namespace Sapar\Component\SfvChecker;

/**
 * Class SfvItem
 * @package Sapar\Component\SfvChecker
 */
class SfvItem
{
    /** @var string */
    private $hash;
    /** @var string */
    private $file;

    public function __construct($file, $hash)
    {
        $this->hash = trim($hash);
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }
}