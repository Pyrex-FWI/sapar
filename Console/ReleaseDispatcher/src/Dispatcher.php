<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 10/02/2019
 * Time: 15:25
 */

namespace Sapar\Console\ReleaseDispatcher;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class Dispatcher
{
    private $format;
    private $target;

    /**
     * Dispatcher constructor.
     * @param $format string Expression language
     * @param $target
     */
    public function __construct($format, $target)
    {
        $this->format = $format;
        $this->target = $target;
    }

    public function move(AlbumReleaseDirectory $release)
    {
        $target = $this->buildTarget($release);
        $release->move($target);
    }

    /**
     * @param AlbumReleaseDirectory $releaseDirectory
     * @return string
     */
    public function dryRunMove(AlbumReleaseDirectory $releaseDirectory)
    {
        return $this->buildTarget($releaseDirectory);
    }

    /**
     * @param AlbumReleaseDirectory $release
     * @return string
     */
    private function buildTarget(AlbumReleaseDirectory $release)
    : string
    {
        $expressionLang = new ExpressionLanguage();
        $target         = $expressionLang->evaluate(
            $this->format,
            [
                'target_path' => $this->target,
                'release'     => $release
            ]
        );

        return $target;
    }
}
