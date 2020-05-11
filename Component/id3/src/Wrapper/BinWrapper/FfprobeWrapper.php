<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Process\Process;
use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * Class FfprobeWrapper.
 */
class FfprobeWrapper extends BinWrapperBase
{
    public const DEFAULT_BIN_NAME = 'ffprobe';

    private $rawReadOutput;
    private $cleanOuput;

    /**
     * @throws \Exception
     */
    public function read(Id3MetadataInterface $id3Metadata): bool
    {
        $this->outputError = null;
        $this->readBinCheck($id3Metadata);

        $process = $this->getProcessForRead($id3Metadata->getFile()->getRealPath())->exec();
        if (!$process->isSuccessful()) {
            $this->outputError = sprintf('%s - %s', $process->getErrorOutput(), $process->getCommandLine());

            return false; // @codeCoverageIgnore
        }
        $this->rawReadOutput = $process->getOutput();
        $this->cleanOuput    = json_decode($this->rawReadOutput, true);

        $id3Metadata
            ->setArtist((string) $this->get('artist'))
            ->setAlbum((string) $this->get('album'))
            ->setGenre((string) $this->get('genre'))
            //->setComment((string) $this->get('description')) #Description not available in ffprobe
            ->setBpm((float) $this->get('TBPM'))
            ->setTitle((string) $this->get('title'))
            ->setYear((int) $this->get('date'))
            ->setReader(sprintf('FFprobe (%s)', $this->getVersion()))
            ->setExecTime($process->getStopWatchEvent()->getDuration())
            ->setReadCmd($process->getCommandLine())
        ;

        return true;
    }

    /**
     * @return array
     */
    public function getSupportedExtensionsForWrite()
    {
        return [];
    }

    public function getSupportedExtensionsForRead(): array
    {
        return ['mp3', 'flac', 'mp4'];
    }

    /**
     * @param Id3MetadataInterface $id3Metadata
     *                                          {@inheritdoc}
     */
    public function write(Id3MetadataInterface $id3Metadata): void
    {
    }

    /**
     * @return bool true
     */
    public function versionIsSupported(): bool
    {
        $ffprobe = version_compare($this->getVersion(), '2.8.14') >= 0;
        $avprobe = version_compare($this->getVersion(), '11.12') >= 0;

        return $ffprobe || $avprobe;
    }

    protected function getProcessForRead($file): Process
    {
        return $this->getProcess(['-v', 'quiet', '-show_format', '-show_streams', $file, '-of', 'json']);
    }

    protected function retrieveVersion(): void
    {
        $process = $this->getProcess('-version')->exec();
        $re      = '/(version)?\s(?P<version>(?P<major>\d{1,3})\.(?P<minor>\d{1,3})(\.(?P<bugfix>\d{1,3}))?)/';
        if (preg_match_all($re, $process->getOutput(), $matches, PREG_SET_ORDER, 0)) {
            $this->version = $matches[0]['version'];
            $this->major   = $matches[0]['major'];
            $this->minor   = $matches[0]['minor'];
        }
    }

    /**
     * @codeCoverageIgnore
     */
    protected function getProcessForWrite(Id3MetadataInterface $id3Metadata): Process
    {
        // Not supported
    }

    /**
     * @param string $key
     */
    private function get($key)
    {
        return isset($this->cleanOuput['format']['tags'][$key]) ? trim($this->cleanOuput['format']['tags'][$key]) : null;
    }
}
