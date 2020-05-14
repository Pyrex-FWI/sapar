<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Helper;
use Sapar\Component\Id3\Process\Process;
use Sapar\Contract\Id3\Id3MetadataInterface;

/**
 * Class MediainfoWrapper.
 */
class MediainfoWrapper extends BinWrapperBase
{
    public const DEFAULT_BIN_NAME = 'mediainfo';

    /** @var  */
    private $rawReadOutput;

    /**
     * @throws \Exception
     */
    public function read(Id3MetadataInterface $id3Metadata): bool
    {
        $this->outputError = null;
        $this->readBinCheck($id3Metadata);
        $process = $this->getProcessForRead($id3Metadata->getFile()->getRealPath());
        $process->exec();
        $simpleXMLElement = @simplexml_load_string($process->getOutput());
        if (!$process->isSuccessful() || !$simpleXMLElement instanceof  \SimpleXMLElement) {
            //@codeCoverageIgnoreStart
            $this->outputError = sprintf('%s - %s', $process->getErrorOutput(), $process->getCommandLine());

            return false;
            //@codeCoverageIgnoreEnd
        }

        if ((string) $simpleXMLElement->media->attributes()['ref'] === $id3Metadata->getFile()->getRealPath()) {
            /* @var \SimpleXMLElement $simpleXMLElement */
            /* @noinspection PhpUndefinedFieldInspection */
            $this->rawReadOutput = $simpleXMLElement->media->track[0];
            if ($this->getFileSize() > 0) {
                $this->normalize($id3Metadata);
                $id3Metadata->setExecTime($process->getStopWatchEvent()->getDuration());
                $id3Metadata->setReadCmd($process->getCommandLine());

                return true;
            }
        }

        return false; // @codeCoverageIgnore
    }

    public function getSupportedExtensionsForRead(): array
    {
        return [Helper::getFlacExt(), Helper::getMp3Ext(), Helper::getMp4Ext()];
    }

    public function write(Id3MetadataInterface $id3Metadata): void
    {
        // Not supported
    }

    public function getSupportedExtensionsForWrite(): array
    {
        return [];
    }

    public function versionIsSupported(): bool
    {
        return version_compare($this->getVersion(), '17.0') >= 0;
    }

    protected function retrieveVersion(): void
    {
        $process = $this->getProcess('--Version')->exec();
        $str     = $process->getOutput();
        //'MediaInfoLib - v17.12'
        $re = '/(?P<version>(?P<major>\d{1,3})\.(?P<minor>\d{1,3}))$/';
        if (preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0)) {
            $this->version = $matches[0]['version'];
            $this->major   = $matches[0]['major'];
            $this->minor   = $matches[0]['minor'];
        }
    }

    /**
     * @var string
     */
    protected function getProcessForRead(string $file): Process
    {
        return $this->getProcess(['--Full', '--Output=XML', $file]);
    }

    /**
     * @codeCoverageIgnore
     */
    protected function getProcessForWrite(Id3MetadataInterface $id3Metadata): Process
    {
        // Not supported
    }

    private function normalize(Id3MetadataInterface $id3Metadata): void
    {
        $id3Metadata->setTitle($this->get('Title'));
        $id3Metadata->setArtist($this->get('Performer'));
        $id3Metadata->setAlbum($this->get('Album'));
        $id3Metadata->setGenre($this->get('Genre'));
        $id3Metadata->setYear($this->extractYear($this->get('Original_Released_date') ? $this->get('Original_Released_date') : $this->get('Recorded_Date')));
        $id3Metadata->setComment($this->get('Comment'));
        $id3Metadata->setBpm((float) $this->get('BPM'));
        $id3Metadata->setKey($this->get('Initial_key'));
        $id3Metadata->setTimeDuration($this->getDuration());
        $id3Metadata->setReader(sprintf('Mediainfo (%s)', $this->getVersion()));
    }

    /**
     * To check UTC 2014-10- 7.
     */
    private function extractYear(?string $rawRecordedDate): ?int
    {
        $result = null;
        preg_match_all('/^(...)?\s?(?P<year>\d{4})(\-\s?\d{1,2}\-\s?\d{1,2})?$/', (string) $rawRecordedDate, $match_all);
        if ($match_all['year'][0] ?? false) {
            $result = (int) ($match_all['year'][0]);
        }

        return $result;
    }

    /**
     * @param $tagName
     *
     * @return string|mixed|null
     */
    private function get($tagName)
    {
        $return = null;
        if ($this->rawReadOutput->{$tagName}) {
            return (string) $this->rawReadOutput->{$tagName};
        }
        if ($this->rawReadOutput->extra->{$tagName}) {
            //@codeCoverageIgnoreStart
            return (string) $this->rawReadOutput->extra->{$tagName};
            //@codeCoverageIgnoreEnd
        }

        return $return;
    }

    private function getDuration(): ?float
    {
        return (float) $this->rawReadOutput->Duration[0];
    }

    private function getFileSize(): int
    {
        return (int) $this->rawReadOutput->FileSize;
    }
}
