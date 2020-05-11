<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

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
     * @param mixed $binPath
     *
     * @return BinWrapperInterface
     */
    public function setBinPath($binPath);

    /**
     * @return bool true
     */
    public function versionIsSupported(): bool;
}
