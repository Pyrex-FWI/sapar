<?php
declare(strict_types=1);

namespace Sapar\Id3Metadata;

use Sapar\Component\Id3\Metadata\Id3Metadata;
use Sapar\Component\Id3\Wrapper\BinWrapper\BinWrapperInterface;
use Sapar\Component\Id3\Wrapper\BinWrapper\Eyed3Wrapper;
use Sapar\Component\Id3\Wrapper\BinWrapper\FfprobeWrapper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MediainfoWrapper;
use Sapar\Component\Id3\Wrapper\BinWrapper\MetaflacWrapper;
use Symfony\Component\Process\Process;

class Id3MetadataManager
{
    private const PRIORITY = [
        MediainfoWrapper::class => 10000,
        FfprobeWrapper::class => 5000,
        Eyed3Wrapper::class => 1000,
        MetaflacWrapper::class => 400,
    ];
    /**
     * @var BinWrapperInterface[]
     */
    private $metaDataWrappers;

    /**
     * Id3MetadataManager constructor.
     * @param iterable $metaDataWrappers
     * @param int[] $priority
     * @throws MissingMetaWrapperException
     */
    public function __construct(iterable $metaDataWrappers, $priority = self::PRIORITY)
    {
        /** @var BinWrapperInterface[] $metaDataWrappers */
        $metaDataWrappers = iterator_to_array($metaDataWrappers);
        $metaDataWrappers = $this->autoSetBinPath($metaDataWrappers);

        if (0 == count($metaDataWrappers)) {
            throw new MissingMetaWrapperException('No wrappers or associated bin was found. Ensure you have minimum requirement tools.');
        }

        $this->metaDataWrappers = $metaDataWrappers;
    }

    protected function getBinPathFor(string $binString): ?string
    {
        $process = Process::fromShellCommandline(sprintf('which %s', $binString));
        $process->run();

        $bin = trim($process->getOutput());

        if ($process->getExitCode() == 0 && $bin && is_executable($bin)) {
            return $bin;
        }

        return null;
    }

    /**
     * @param BinWrapperInterface[] $metaDataWrapper
     * @return BinWrapperInterface[]
     */
    private function autoSetBinPath(array $metaDataWrapper): array
    {
        array_map(
            function ($binWrapper) {
                $binPath = $this->getBinPathFor($binWrapper::DEFAULT_BIN_NAME);
                if ($binPath) {
                    $binWrapper->setBinPath($binPath);
                }
            },
            $metaDataWrapper
        );

        $metaDataWrapper = array_filter($metaDataWrapper, function ($binWrapper) {
            return $binWrapper->getBinPath();
        });

        usort($metaDataWrapper, function($a, $b) {
            if (get_class($a) == get_class($b)) {
                return 0;
            }
            return (self::PRIORITY[get_class($a)] < self::PRIORITY[get_class($b)]) ? 1 : -1;
        });

        return $metaDataWrapper;
    }

    public function read(string $file): ?Id3Metadata
    {
        $id3metadata = new Id3Metadata($file);

        foreach ($this->metaDataWrappers as $binWrapper) {
            if (!$binWrapper->supportRead($id3metadata)) continue;
            if ($binWrapper->read($id3metadata)) {
                break;
            }
        }

        return $id3metadata;
    }
}