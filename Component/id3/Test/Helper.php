<?php

namespace Sapar\Component\Id3\Test;

class Helper
{
    public static function getSampleMp3File()
    {
        return __DIR__.'/toddle.mp3';
    }

    public static function getSampleFlacFile()
    {
        return __DIR__.'/04.flac';
    }

    public static function getWrongMp3File()
    {
        return __DIR__.'/wrong_file.mp3';
    }

    public static function getMediainfoPath()
    {
        return '/usr/bin/mediainfo';
    }

    public static function getEyed3Path()
    {
        return '/usr/local/bin/eyeD3';
    }

    public static function getMetaflacPath()
    {
        return '/usr/bin/metaflac';
    }

    public static function getFfprobePath()
    {
        return '/usr/bin/ffprobe';
    }

    /**
     * return backuped fule name.
     *
     * @param $file
     *
     * @return string
     */
    public static function backupFile($file)
    {
        $backUpFile = $file.'.back';
        copy($file, $backUpFile);

        return $backUpFile;
    }

    public static function restoreFile($file)
    {
        $backUpFile = $file.'.back';

        if (!is_file($backUpFile)) {
            return;
        }

        if (is_file($file)) {
            unlink($file);
        }
        rename($backUpFile, $file);
    }
}
