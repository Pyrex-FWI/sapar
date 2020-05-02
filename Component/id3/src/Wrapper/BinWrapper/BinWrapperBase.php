<?php
/**
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Exception\Id3Exception;
use Sapar\Component\Id3\Exception\ReadException;
use Sapar\Component\Id3\Metadata\Id3MetadataInterface;
use Sapar\Component\Id3\Process\Process;

/**
 * Class BinWrapperBase.
 */
abstract class BinWrapperBase implements BinWrapperInterface
{
    /** @var null|string */
    protected $binPath;
    /** @var int */
    protected $major;
    /** @var int */
    protected $minor;
    /** @var string */
    protected $version;
    /** @var string */
    protected $outputError;

    abstract protected function retrieveVersion(): void;

    abstract protected function getProcessForRead(string $file): Process;

    abstract protected function getProcessForWrite(Id3MetadataInterface $id3Metadata): Process;

    /**
     * @var array|mixed
     */
    protected function getProcess($args): Process
    {
        $process = new Process($this->binPath, (array) $args);

        return $process;
    }

    /**
     * @param string $binPath
     *
     * @throws \Exception
     */
    public function setBinPath($binPath): self
    {
        if ((!file_exists($binPath) || !is_executable($binPath)) && false === strstr($binPath, ' ')) {
            throw new \Exception(sprintf('%s not exist // or not executable', $binPath));
        }

        $this->binPath = $binPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBinPath(): ?string
    {
        return $this->binPath;
    }

    public function supportRead(Id3MetadataInterface $id3Metadata): bool
    {
        return in_array(strtolower($id3Metadata->getFile()->getExtension()), $this->getSupportedExtensionsForRead());
    }

    public function supportWrite(Id3MetadataInterface $id3Metadata): bool
    {
        return in_array($id3Metadata->getFile()->getExtension(), $this->getSupportedExtensionsForWrite());
    }

    /**
     * @return string
     */
    public function getVersion(): ?string
    {
        if (null === $this->version) {
            $this->retrieveVersion();
        }

        return $this->version;
    }

    /**
     * @throws ReadException x
     * @throws Id3Exception  x
     */
    protected function readBinCheck(Id3MetadataInterface $id3Metadata): void
    {
        if (!$this->supportRead($id3Metadata)) {
            throw new ReadException(sprintf('Read not supported for %s', $id3Metadata->getFile()->getRealPath()));
        }

        // @codeCoverageIgnoreStart
        if (!$this->versionIsSupported()) {
            throw new Id3Exception(sprintf('Version %s is not supported for %s', $this->getVersion(), get_class($this)));
        }
        // @codeCoverageIgnoreEnd
    }
}
