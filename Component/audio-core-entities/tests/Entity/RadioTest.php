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
final class RadioTest extends EntityBase
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

        static::assertContains($hitUrls[0], $radio->getHitPagesUrls());
        static::assertSame('NRJ', $radio->getName());
        $radio->getId();
    }
}
