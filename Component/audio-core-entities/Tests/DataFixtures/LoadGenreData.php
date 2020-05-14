<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi[at]gmail.com>
 */

namespace Sapar\Component\AudioCoreEntity\Tests\DataFixtures;

use Sapar\Component\AudioCoreEntity\Entity\Genre;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGenreData implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $genre = new Genre();
        $genre->setName('Pop');
        $manager->persist($genre);
        $manager->flush();
    }
}
