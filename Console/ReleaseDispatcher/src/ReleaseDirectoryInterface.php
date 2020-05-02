<?php
/**
 * User: Kris <yemistikrys@gmail.com>
 * Date: 10/02/2019
 * Time: 10:58
 */

namespace Sapar\Console\ReleaseDispatcher;

interface ReleaseDirectoryInterface
{
    public function isValid()
    : bool;

    public function prepare()
    : self;

    public function getYear()
    : ?int;

    public function move($target)
    : void;

    public function getName()
    : string;
}
