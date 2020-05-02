<?php

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Wrapper\Id3WrapperInterface;

/**
 * Interface BinWrapperInterface.
 */
interface BinWrapperInterface extends Id3WrapperInterface
{
    /**
     * @return string
     */
    public function getVersion();

    /**
     * @var string
     *
     * @return BinWrapperInterface
     */
    public function setBinPath($binPath);

    /**
     * @return bool true
     */
    public function versionIsSupported(): bool;
}
