<?php

namespace Sapar\Component\Id3\Process;

use Symfony\Component\Process\Exception\LogicException;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process as SymfonyProcess;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Stopwatch\StopwatchEvent;

/**
 * Class Process.
 */
class Process extends SymfonyProcess
{
    /** @var string */
    protected $bin;

    /** @var array */
    protected $arguements = [];

    /** @var StopwatchEvent */
    protected $stopWatchEvent;

    /** @var bool */
    protected $runtimeError = false;

    /**
     * Process constructor.
     *
     * @param mixed|null $commandline
     * @param int        $timeout
     */
    public function __construct(
        string $bin,
        ?array $commandline = null,
        ?string $cwd = null,
        ?array $env = null,
        ?mixed $input = null,
        $timeout = 60,
        array $options = null
    ) {
        parent::__construct(array_merge([$bin], (array) $commandline), $cwd, $env, $input, $timeout, $options);
        $this->bin = $bin;
    }

    /**
     * @throws RuntimeException When process can't be launched
     * @throws RuntimeException When process stopped after receiving signal
     * @throws LogicException   In case a callback is provided and output has been disabled
     *
     * @return Process
     */
    public function exec(): self
    {
        $sw = new Stopwatch();
        $sw->start('run');
        try {
            parent::run();
            // @codeCoverageIgnoreStart
        } catch (RuntimeException $runtimeException) {
            $this->runtimeError = true;
        }
        // @codeCoverageIgnoreEnd

        $this->stopWatchEvent = $sw->stop('run');

        return $this;
    }

    /**
     * @return StopwatchEvent
     */
    public function getStopWatchEvent(): ?StopwatchEvent
    {
        return $this->stopWatchEvent;
    }

    public function isSuccessful(): bool
    {
        return $this->runtimeError ? false : parent::isSuccessful();
    }
}
