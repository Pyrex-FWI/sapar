<?php

declare(strict_types=1);

/**
 * This file is part of the Sapar project.
 * @author Christophe Pyree <pyrex-fwi@gmail.com>
 */

namespace AudioCoreEntity\Tests\Entity;

use AudioCoreEntity\Tests\EntityBase;

/**
 * @internal
 * @coversNothing
 */
class RadioTest extends EntityBase
{
    public function testGenreMethods(): void
    {
        $radio   = self::getRadioInstance();
        $hitUrls = [
            'http://someurl.com/toto/dld?dff=f',
            'http://someurl.com/toto/dld?dff=f',
            'http://someurl.com/toto/dld?dff=f',
        ];
        $radio
            ->setName('NRJ')
            ->setHitPagesUrls($hitUrls)
        ;

        $this->assertContains($hitUrls[0], $radio->getHitPagesUrls());
        $this->assertEquals('NRJ', $radio->getName());
        $radio->getId();
    }
}
