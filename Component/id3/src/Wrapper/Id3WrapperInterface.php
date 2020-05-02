<?php
/**
 * @author Christophe Pyree <christophe.pyree[at]gmail.com>
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
