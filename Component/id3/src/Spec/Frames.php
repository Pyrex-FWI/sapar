<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\Id3\Spec;

/**
 * Class Frames.
 *
 * @codeCoverageIgnore
 */
final class Frames
{
    public const album                   = 'TALB';
    public const albumArtist             = 'TPE2';
    public const albumSortOrder          = 'TSOA';
    public const arranger                = 'TPE4';
    public const artist                  = 'TPE1';
    public const audioDelay              = 'TDLY';
    public const audioLength             = 'TLEN';
    public const audioSize               = 'TSIZ';
    public const author                  = 'TOLY';
    public const bpm                     = 'TBPM';
    public const composer                = 'TCOM';
    public const conductor               = 'TPE3';
    public const copyright               = 'TCOP';
    public const date                    = 'TDAT';
    public const discNumber              = 'TPOS';
    public const encodedBy               = 'TENC';
    public const encodingSettings        = 'TSSE';
    public const filename                = 'TOFN';
    public const fileOwner               = 'TOWN';
    public const fileType                = 'TFLT';
    public const genre                   = 'TCON';
    public const grouping                = 'TIT1';
    public const initialKey              = 'TKEY';
    public const isrc                    = 'TSRC';
    public const itunesAlbumSortOrder    = 'TSO2';
    public const itunesCompilationFlag   = 'TCMP';
    public const itunesComposerSortOrder = 'TSOC';
    public const language                = 'TLAN';
    public const lyricist                = 'TEXT';
    public const mediaType               = 'TMED';
    public const mood                    = 'TMOO';
    public const organization            = 'TPUB';
    public const originalAlbum           = 'TOAL';
    public const originalArtist          = 'TOPE';
    public const originalYear            = 'TORY';
    public const performerSortOrder      = 'TSOP';
    public const producedNotice          = 'TPRO';
    public const radioOwner              = 'TRSO';
    public const radioStationName        = 'TRSN';
    public const recordingDates          = 'TRDA';
    public const setSubtitle             = 'TSST';
    public const time                    = 'TIME';
    public const title                   = 'TIT2';
    public const titleSortOrder          = 'TSOT';
    public const track                   = 'TRCK';
    public const version                 = 'TIT3';
    public const year                    = 'TYER';
    public const encodingTime            = 'TDEN';
    public const originalReleaseTime     = 'TDOR';
    public const releaseTime             = 'TDRL';
    public const taggingTime             = 'TDTG';
    public const wwwArtist               = 'WOAR';
    public const wwwCommercialInfo       = 'WCOM';
    public const wwwCopyright            = 'WCOP';
    public const wwwFileInfo             = 'WOAF';
    public const wwwPayment              = 'WPAY';
    public const wwwPublisher            = 'WPUB';
    public const wwwRadio                = 'WORS';
    public const wwwSource               = 'WOAS';

    /**
     * Return all possible keys that reference artist information.
     *
     * @return array
     */
    public static function getArtistFrames()
    {
        return [
            self::artist,
            self::originalArtist,
            self::albumArtist,
        ];
    }

    /**
     * Return all possible keys that reference album information.
     *
     * @return array
     */
    public static function getAlbumFrames()
    {
        return [
            self::album,
            self::originalAlbum,
        ];
    }

    /**
     * Return all possible keys that reference title information.
     *
     * @return array
     */
    public static function getTitleFrames()
    {
        return [
            self::title,
            self::titleSortOrder,
            self::setSubtitle,
        ];
    }

    /**
     * @return array
     */
    public static function getGenreFrames()
    {
        return [
            self::genre,
        ];
    }
}
