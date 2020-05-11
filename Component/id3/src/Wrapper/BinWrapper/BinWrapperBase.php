<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Exception\Id3Exception;
use Sapar\Component\Id3\Exception\ReadException;
use Sapar\Component\Id3\Process\Process;
use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * Class BinWrapperBase.
 */
abstract class BinWrapperBase implements BinWrapperInterface
{
    /** @var string|null */
    protected $binPath;
    /** @var int */
    protected $major;
    /** @var int */
    protected $minor;
    /** @var string */
    protected $version;
    /** @var string */
    protected $outputError;

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

    public function getBinPath(): ?string
    {
        return $this->binPath;
    }

    public function supportRead(Id3MetadataInterface $id3Metadata): bool
    {
        return \in_array(strtolower($id3Metadata->getFile()->getExtension()), $this->getSupportedExtensionsForRead(), true);
    }

    public function supportWrite(Id3MetadataInterface $id3Metadata): bool
    {
        return \in_array($id3Metadata->getFile()->getExtension(), $this->getSupportedExtensionsForWrite(), true);
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

    abstract protected function retrieveVersion(): void;

    abstract protected function getProcessForRead(string $file): Process;

    abstract protected function getProcessForWrite(Id3MetadataInterface $id3Metadata): Process;

    /**
     * @var array|mixed
     *
     * @param mixed $args
     */
    protected function getProcess($args): Process
    {
        return new Process($this->binPath, (array) $args);
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
            throw new Id3Exception(sprintf('Version %s is not supported for %s', $this->getVersion(), static::class));
        }
        // @codeCoverageIgnoreEnd
    }
}
