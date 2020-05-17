<?php
/**
 * Created by PhpStorm.
 * User: Kris
 * Date: 21/01/2019
 * Time: 18:51
 */

namespace Sapar\Console\MovieUnrar\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Finder\SplFileInfo;

class RarCollection extends ArrayCollection
{
    /**
     * @return SplFileInfo
     */
    public function getRoot()
    {
        foreach ($this->toArray() as $file) {
            /** @var SplFileInfo $file */

            if ((new \SplFileInfo($file[0]))->getExtension() === 'rar') {
                return $file[0];
            }
        }
    }
}