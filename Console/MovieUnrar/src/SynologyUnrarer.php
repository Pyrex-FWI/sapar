<?php

namespace Sapar\Console\MovieUnrar;

use Symfony\Component\Process\Process;

class SynologyUnrarer
{
    /**
     * @param $file
     * @return Process
     */
    public static function extract($file, $pathTarget)
    {
        $process = Process::fromShellCommandline('unrar x -y $FILE $PATH_TARGET');
        $process->setTimeout(1800); // 30min
        $process->run(null, [
            'FILE'        => $file,
            'PATH_TARGET' => $pathTarget
        ]);

        return $process;
    }
}
