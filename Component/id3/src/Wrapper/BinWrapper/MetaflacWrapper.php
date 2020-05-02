<?php

namespace Sapar\Component\Id3\Wrapper\BinWrapper;

use Sapar\Component\Id3\Helper;
use Sapar\Component\Id3\Metadata\Id3MetadataInterface;
use Sapar\Component\Id3\Process\Process;

/**
 * Class MetaflacWrapper.
 */
class MetaflacWrapper extends BinWrapperBase
{
    public const DEFAULT_BIN_NAME = 'metaflac';

    /** @var string */
    private $rawReadOutput;

    /**
     * @throws \Exception
     */
    public function read(Id3MetadataInterface $id3Metadata): bool
    {
        $this->readBinCheck($id3Metadata);
        $this->outputError = null;

        $process = $this->getProcessForRead($id3Metadata->getFile()->getRealPath())->exec();
        if ($process->isSuccessful() && preg_match_all("/^(?P<tag>[\w]*)=(?P<value>[\w\s\n\']*)$/m", $process->getOutput(), $match)) {
            $this->rawReadOutput = array_combine($match['tag'], $match['value']);
            $id3Metadata
                ->setArtist((string) $this->get('artist'))
                ->setAlbum((string) $this->get('album'))
                ->setGenre((string) $this->get('genre'))
                ->setComment((string) $this->get('description'))
                ->setBpm((float) $this->get('bpm'))
                ->setTitle((string) $this->get('title'))
                ->setYear((int) $this->get('date'))
                ->setReader(sprintf('Metaflac (%s)', $this->getVersion()))
                ->setExecTime($process->getStopWatchEvent()->getDuration())
                ->setReadCmd($process->getCommandLine())
            ;

            return true;
        }
        $this->outputError = sprintf('%s - %s', $process->getErrorOutput(), $process->getCommandLine());

        return false; // @codeCoverageIgnore
    }

    /**
     * @var string
     */
    public function getProcessForRead($file): Process
    {
        return $this->getProcess(['--export-tags-to=-', $file]);
    }

    public function getSupportedExtensionsForWrite(): array
    {
        return [Helper::getFlacExt()];
    }

    /**
     * /**
     *
     *
     * @throws \Exception
     */
    public function write(Id3MetadataInterface $id3Metadata): bool
    {
        if (!$this->supportWrite($id3Metadata)) {
            throw new \Exception(sprintf('Write is not supported for %s by %s', $id3Metadata->getFile()->getRealPath(), self::class));
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
        $arguments[] = $id3Metadata->getFile()->getRealPath();
        if (null !== $id3Metadata->getArtist()) {
            $arguments[] = '--remove-tag=ARTIST';
            $arguments[] = '--set-tag=ARTIST='.$id3Metadata->getArtist();
        }
        if (null !== $id3Metadata->getAlbum()) {
            $arguments[] = '--remove-tag=ALBUM';
            $arguments[] = '--set-tag=ALBUM='.$id3Metadata->getAlbum();
        }
        if (null !== $id3Metadata->getTitle()) {
            $arguments[] = '--remove-tag=TITLE';
            $arguments[] = '--set-tag=TITLE='.$id3Metadata->getTitle();
        }
        if (null !== $id3Metadata->getGenre()) {
            $arguments[] = '--remove-first-tag=GENRE';
            $arguments[] = '--set-tag=GENRE='.$id3Metadata->getGenre();
        }
        if (null !== $id3Metadata->getComment()) {
            $arguments[] = '--remove-tag=DESCRIPTION';
            $arguments[] = '--set-tag=DESCRIPTION='.$id3Metadata->getComment();
        }
        if (null !== $id3Metadata->getBpm()) {
            $arguments[] = '--remove-tag=BPM';
            $arguments[] = '--set-tag=BPM='.$id3Metadata->getBpm();
        }

        return $this->getProcess($arguments);
    }

    /**
     * @param mixed|null $key
     */
    private function get($key)
    {
        $key = strtoupper($key);

        return isset($this->rawReadOutput[$key]) ? trim($this->rawReadOutput[$key]) : null;
    }

    /**
     * @return string|null
     */
    protected function retrieveVersion(): void
    {
        $process = $this->getProcess(['--v'])->exec();
        $stringVersion = $process->getOutput();
        $re = '/(?P<version>(?P<major>\d{1,3})\.(?P<minor>\d{1,3})(\.(?P<bugfix>\d{1,3}))?)$/';
        if (preg_match_all($re, $stringVersion, $matches, PREG_SET_ORDER, 0)) {
            $this->version = $matches[0]['version'];
            $this->major = $matches[0]['major'];
            $this->minor = $matches[0]['minor'];
        }
    }

    public function versionIsSupported(): bool
    {
        return version_compare($this->getVersion(), '1.3.0') >= 0;
    }
}
