<?php

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Helper;
use Sapar\Component\Id3\Metadata\Id3MetadataInterface;
use Sapar\Component\Id3\Process\Process;

/**
 * Class Eyed3Wrapper.
 */
class Eyed3Wrapper extends BinWrapperBase
{
    public const DEFAULT_BIN_NAME = 'eyeD3';

    /** @var string */
    private $rawReadOutput;

    /**
     * @throws \Sapar\Component\Id3\Exception\Id3Exception
     * @throws \Sapar\Component\Id3\Exception\ReadException
     */
    public function read(Id3MetadataInterface $id3Metadata): bool
    {
        $this->outputError = null;
        $this->readBinCheck($id3Metadata);
        $process = $this->getProcessForRead($id3Metadata->getFile()->getRealPath());
        $process->exec();

        //@codeCoverageIgnoreStart
        if (!$process->isSuccessful()) {
            $this->outputError = sprintf('%s - %s', $process->getErrorOutput(), $process->getCommandLine());

            return false;
        }
        //@codeCoverageIgnoreEnd

        $this->rawReadOutput = iconv('ISO-8859-1', 'UTF-8', $process->getOutput());

        $id3Metadata
            ->setArtist($this->getFromRegex('/^artist:\s(?P<artist>.*)$/m', 'artist'))
            ->setAlbum($this->getFromRegex('/^album:\s(?P<album>.*)$/m', 'album'))
            ->setGenre($this->getFromRegex('/genre:\s(?P<genre>.*)\s\(.*\)$/m', 'genre'))
            ->setComment($this->getFromRegex('/^Comment:\s.*?\n^(?P<comment>.*)$/m', 'comment'))
            ->setBpm($this->getFromRegex('/^BPM:\s(?P<bpm>\d{1,3})$/m', 'bpm'))
            ->setTitle($this->getFromRegex('/^title:\s(?P<title>.*)$/m', 'title'))
            ->setYear($this->getFromRegex('/^recording\sdate:\s(?P<recording_date>\d{4})$/m', 'recording_date'))
            ->setReader(sprintf('EyeD3 (%s)', $this->getVersion()))
            ->setExecTime($process->getStopWatchEvent()->getDuration())
            ->setReadCmd($process->getCommandLine())
        ;

        return true;
    }

    protected function retrieveVersion(): void
    {
        $process = $this->getProcess(['--version'])->exec();
        $this->version = trim($process->getOutput());
        $versionArray = explode('.', $this->version);
        $this->minor = $versionArray[1];
        $this->major = $versionArray[0];
    }

    /**
     * @param $file
     */
    protected function getProcessForRead($file): Process
    {
        return $this->getProcess(['--no-color', '--v2', $file]);
    }

    public function getSupportedExtensionsForWrite(): array
    {
        return [Helper::getMp3Ext(), Helper::getMp4Ext()];
    }

    /**
     * @throws \Exception
     */
    public function write(Id3MetadataInterface $id3Metadata): bool
    {
        if (!$this->supportWrite($id3Metadata)) {
            throw new \Exception(sprintf('Write not supported for %s', $id3Metadata->getFile()->getRealPath()));
        }

        $process = $this->getProcessForWrite($id3Metadata)->exec();

        return $process->isSuccessful();
    }

    public function getSupportedExtensionsForRead(): array
    {
        return $this->getSupportedExtensionsForWrite();
    }

    protected function getProcessForWrite(Id3MetadataInterface $id3Metadata): Process
    {
        $arguments = [];
        $arguments[] = '--log-level';
        $arguments[] = 'critical';
        $arguments[] = '--quiet';
        $arguments[] = $id3Metadata->getFile()->getRealPath();

        if ($id3Metadata->getArtist()) {
            $arguments[] = '--artist';
            $arguments[] = $id3Metadata->getArtist();
        }

        if ($id3Metadata->getAlbum()) {
            $arguments[] = '--album';
            $arguments[] = $id3Metadata->getAlbum();
        }
        if ($title = $id3Metadata->getTitle()) {
            $arguments[] = '--title';
            $arguments[] = $id3Metadata->getTitle();
        }

        if ($genre = $id3Metadata->getGenre()) {
            $arguments[] = '--genre';
            $arguments[] = $genre;
        }

        if ($year = $id3Metadata->getYear()) {
            $arguments[] = '--release-year';
            $arguments[] = $id3Metadata->getYear();
            $arguments[] = '--orig-release-date';
            $arguments[] = $id3Metadata->getYear();
        }

        if ($comment = $id3Metadata->getComment()) {
            $arguments[] = '--remove-all-comments';
            $arguments[] = '--add-comment';
            $arguments[] = $id3Metadata->getComment();
        }

        if ($bpm = $id3Metadata->getBpm()) {
            $arguments[] = '--bpm';
            $arguments[] = $id3Metadata->getBpm();
        }

        return $this->getProcess($arguments);
    }

    /**
     * @param string $patern
     * @param string $namedSubMask
     *
     * @return string
     */
    private function getFromRegex($patern, $namedSubMask): ?string
    {
        preg_match_all($patern, $this->rawReadOutput, $match);

        return $match[$namedSubMask][0] ?? null;
    }

    /**
     * @return bool true
     */
    public function versionIsSupported(): bool
    {
        return version_compare($this->getVersion(), '0.8') >= 0;
    }
}
