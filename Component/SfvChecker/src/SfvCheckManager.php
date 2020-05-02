<?php

namespace Sapar\Component\SfvChecker;

use Sapar\Component\SfvChecker\Calculator\CalculatorInterface;
use Sapar\Component\SfvChecker\Calculator\SynologyCalculator;
use Symfony\Component\Process\Process;

/**
 * Class SfvChecker
 */
class SfvCheckManager
{
    /** @var ReaderInterface */
    private $reader;
    /** @var SynologyCalculator */
    private $calculator;
    /** @var string */
    private $file;

    /**
     * @param ReaderInterface $reader
     * @param CalculatorInterface $calculator
     * @param string $file
     * @return SfvCheckManager
     */
    public static function create(ReaderInterface $reader, CalculatorInterface $calculator, $file)
    {
        $sfvChecker = new self();
        $sfvChecker->reader = $reader;
        $sfvChecker->calculator = $calculator;
        $sfvChecker->file = $file;

        return $sfvChecker;
    }

    /**
     * @return bool
     */
    public function isCheckable(): bool
    {
        $sfvItems = $this->reader->read($this->file);

        if (count($sfvItems) === 0) {
            return false;
        }

        foreach ($sfvItems as $sfvItem) {
            $calculatedHash = $this->calculator->getHash($sfvItem->getFile());
            if ($sfvItem->getHash() != $calculatedHash) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isCheckableAsync($concurent = 5): bool
    {
        $sfvItems = $this->reader->read($this->file);
        $processPool = [];
        /** @var Process[] $runningProcess */
        $runningProcess = [];
        foreach ($sfvItems as $sfvItem) {
            $processPool[] = [$sfvItem, $this->calculator->getProcess()];
        }

        $i = 0;
        while (count($processPool) > 0 || count($runningProcess) > 0) {
            $this->startProcess($runningProcess, $processPool, $concurent);
            $this->moveEndedProcess($runningProcess);
            usleep(100000);
            $i++;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->isCheckable();
    }

    /**
     * @param array $runningProcess
     * @param       $processPool
     */
    protected function startProcess(array &$runningProcess, &$processPool, $concurent): void
    {
        if (count($runningProcess) >= $concurent || count($processPool) == 0) {
            return;
        }
        $processData = array_shift($processPool);
        /** @var SfvItem $sfvItem */
        $sfvItem = $processData[0];
        /** @var Process $process */
        $process = $processData[1];
        $process->start(null,
            [
                'FILE' => $sfvItem->getFile(),
            ]
        );
        $runningProcess[] = [$sfvItem, $process];
    }

    /**
     * @param array $runningProcess
     * @return bool|null
     */
    protected function moveEndedProcess(array &$runningProcess): ?bool
    {
        foreach ($runningProcess as $i => $processData) {
            if ($processData[1]->isTerminated()) {
                $calculatedHash = $this->calculator->cleanResult($processData[1]->getOutput());
                if ($processData[0]->getHash() != $calculatedHash) {
                    return false;
                }

                unset($runningProcess[$i]);
            }
        }

        return null;
    }
}
