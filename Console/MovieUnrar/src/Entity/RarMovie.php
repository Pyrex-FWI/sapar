<?php
namespace Sapar\Console\MovieUnrar\Entity;

use Symfony\Component\Finder\SplFileInfo;
use Traversable;

Class RarMovie implements \IteratorAggregate
{
    /** @var SplFileInfo */
    protected $file;
    /** @var SplFileInfo */
    private $sfv;
    /** @var RarCollection */
    private $rarFiles;

    public function __toString()
    {
        return sprintf("=====\nMovie: %s\nFiles: %d\nSize:%d\n=====", $this->file->getFilename(), count($this->rarFiles), $this->file->getSize());
    }

    /**
     * Retrieve an external iterator
     * @link  https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return $this->rarFiles->getIterator();
    }

    /**
     * @return mixed
     */
    public function getRarFiles()
    {
        return $this->getRarFiles();
    }
    /**
     * @return SplFileInfo
     */
    public function getRootRar()
    {
        return $this->rarFiles->getRoot();
    }

    /**
     * @return SplFileInfo
     */
    public function getSfv()
    {
        return $this->sfv;
    }
}