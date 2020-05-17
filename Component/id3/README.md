
[![pipeline status](https://gitlab.com/Pyrex-FWI/sapar-id3/badges/master/pipeline.svg)](https://gitlab.com/Pyrex-FWI/sapar-id3/commits/master)
[![coverage report](https://gitlab.com/Pyrex-FWI/sapar-id3/badges/master/coverage.svg)](https://pyrex-fwi.gitlab.io/sapar-id3/)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)



[Phpunit code coverage](https://pyrex-fwi.gitlab.io/sapar-id3/)
[Phpmetrics](https://pyrex-fwi.gitlab.io/sapar-id3/report/)

# Supported id3 bin

<!---
[![Build Status](https://travis-ci.org/Pyrex-FWI/sapar-id3.svg?branch=master)](https://travis-ci.org/Pyrex-FWI/sapar-id3)
--->

The package lays the basis for the simple ID3 tags manipulation.

You can define readers and writers to manipulate the metadata in read or write. 

|                   | [Mediainfo](https://mediaarea.net/en/MediaInfo) (>= 17.0) | [EyeD3](http://eyed3.readthedocs.io/en/latest/) (>= 0.8)  | [metaflac](https://xiph.org/flac/download.html) (>= 1.3.0) | [ffprobe](http://ffmpeg.org/ffprobe.html)  (>= 2.8.14)| [exiftool ]()  ()  | [lltag]()  ()      | [id3info]()  ()    | [id3tool]()  ()    | [mp3info]()  ()    |
|:------------------|:---------------------------------------------------------:|:---------------------------------------------------------:|:----------------------------------------------------------:|:-----------------------------------------------------:|:------------------:|:------------------:|:------------------:|:------------------:|:------------------:|
| Mp3 read          |  ✓                                                        |  ✓                                                        |   no                                                       |   ✓                                                   |                    |                    |                    |                    |                    | 
| Mp3 read comments |  ✓                                                        |  ✓                                                        |   -                                                        |   no                                                  |                    |                    |                    |                    |                    |
| Mp3 write         |  no                                                       |  ✓                                                        |   no                                                       |   ✓                                                   |                    |                    |                    |                    |                    |
| Mp4 read          |  ✓                                                        |  -                                                        |   -                                                        |   -                                                   |                    |                    |                    |                    |                    |
| Mp4 write         |  -                                                        |  -                                                        |   -                                                        |   -                                                   |                    |                    |                    |                    |                    |
| Flac read         |  ✓                                                        |  -                                                        |   -                                                        |   -                                                   |                    |                    |                    |                    |                    |
| Flac write        |  no                                                       |  no                                                       |   -                                                        |   -                                                   |                    |                    |                    |                    |                    |
| Output XML        |  ✓                                                        |  no                                                       |   -                                                        |   ✓                                                   |                    |                    |                    |                    |                    |
| Output JSON       |  ✓                                                        |  no                                                       |   -                                                        |   ✓                                                   |                    |                    |                    |                    |                    |

* '✓', 'no', 'yes' = Tested
* '-' = not tested

# Speed benchmark

| Bin readers     | 100 iterations | 500 iterations |
|:----------------|:--------------:|:--------------:|
| [metaflac]      |     2.249s     |    11.73s      |
| [Mediainfo]     |   **5.362s**   |  **27.19s**    |
| [ffprobe]       |     9.716s     |    48.43s      |
| [EyeD3]         |    13.052s     |    65.423s     |

## Usages

### Read Id3 Tags

```php
<?php

class MyClass
{

    public function readId3()
    {
        $mp3OrFlacFile = '/path/to/file';
        
        /** @var Sapar\Id3\Metadata\Id3MetadataInterface */
        $id3Metadata = new Sapar\Metadata\Id3Metadata($mp3OrFlacFile);
        
        /** @var Sapar\Wrapper\BinWrapper\BinWrapperInterface */
        $mediaInfoWrapper = new Sapar\Wrapper\BinWrapper\MediainfoWrapper();
        $mediaInfoWrapper->setBin('/usr/local/bin/mediainfo');
        
        if ($mediaInfoWrapper->read($metaDataFile)) {
            $metaDataFile->getTitle();
            $metaDataFile->getArtist();
            $metaDataFile->getAlbum();
            $metaDataFile->getGenre();
            $metaDataFile->getYear();
            $metaDataFile->getBpm();
            $metaDataFile->getTimeDuration();
        }
    }
}
```

### Write Id3 Tags

```php
<?php

class MyClass
{

    public function writeId3()
    {
        $mp3OrFlacFile = '/path/to/file';
        
        /** @var Sapar\Id3\Metadata\Id3MetadataInterface */
        $id3Metadata = new Sapar\Metadata\Id3Metadata($mp3OrFlacFile);
        $id3Metadata->setAlbum('album');
        $id3Metadata->setTitle('title');
        $id3Metadata->setGenre('genre');
        $id3Metadata->setYear(2016);
        $id3Metadata->setComment('comment');
        $id3Metadata->setBpm(120);
		
        /** @var Sapar\Wrapper\BinWrapper\BinWrapperInterface */
        $id3v2wrapper = new Sapar\Wrapper\BinWrapper\Id3v2Wrapper();
        $id3v2wrapper->setBin('/usr/local/bin/id3v2');
        
        if ($mediaInfoReader->write($metaDataFile)) {
            //it's done!
        }
    }
```

### Create custom Wrapper

```php
<?php

class MyClass
{

}
```


## Tests

[Show doc](docs/tests.md)
[Releases](releases.md)
