<?php

namespace Sapar\Console\ReleaseDispatcher;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Filesystem;

abstract class AbstractReleaseDirectory implements ReleaseDirectoryInterface
{
	protected $valid = null;
	protected $path;
	protected $fileInfo;
  private $group;
  private $year;

	public function __construct($path)
	{
		$this->path = $path;
		$this->checkDir();
		$this->fileInfo = new \SplFileInfo($path);
	}

    /**
     * @throws FileNotFoundException
     */
	private function checkDir()
	{
	    $fs = new Filesystem();

	    if (false === $fs->exists($this->path)) {
        // @codeCoverageIgnoreStart
        throw new FileNotFoundException(sprintf('\'%s\' not is a valid dir', $this->path));
        // @codeCoverageIgnoreEnd
      }
	}

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     * @return AbstractReleaseDirectory
     */
    protected function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return AbstractReleaseDirectory
     */
    protected function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    public function move($target)
    : void
    {
        if($this->isValid()){
            $fs = new Filesystem();
            $fs->rename($this->path, $target);
        }
    }

    /**
     * @return null
     */
    protected function getValid()
    {
        return $this->valid;
    }

    /**
     * @param null $valid
     * @return AbstractReleaseDirectory
     */
    protected function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    public function getName()
    : string
    {
        return $this->fileInfo->getFilename();
    }
}
