<?php

namespace Sapar\Component\SfvChecker\Calculator;

use Symfony\Component\Process\Process;

class SynologyCalculator implements CalculatorInterface
{
    /**
     * @param string $output
     * @return string
     */
    public static function cleanResult(string $output): string
    {
        return str_pad(trim(strtolower($output)), 8, "0", STR_PAD_LEFT);
    }

    /**
     * @param string $filePath
     * @return string
     */
    public function getHash($filePath): string
    {
        $process = $this->getProcess();
        $process->run(null, [
            'FILE' => $filePath
        ]);

        $output = $process->getOutput();

        return self::cleanResult($output);
    }

    /**
     * @return Process
     */
    public function getProcess(): Process
    {
        $process = Process::fromShellCommandline('cksum -o3  $FILE | awk \'{print $1}\' | xargs printf \'%x\n\'');

        return $process;
    }
}
