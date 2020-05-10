<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Tests\DataFixtures;

use AudioCoreEntity\Entity\Genre;
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
