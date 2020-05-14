<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Wrapper;

use Sapar\Component\Id3\Reader\Id3ReaderInterface;
use Sapar\Component\Id3\Writer\Id3WriterInterface;

/**
 * Interface Id3WrapperInterface.
 */
interface Id3WrapperInterface extends Id3ReaderInterface, Id3WriterInterface
{
}
