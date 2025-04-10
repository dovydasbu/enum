<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\Status;
use PHPUnit\Framework\TestCase;

class EnumFromKeyTest extends TestCase
{
    public function testFromKeyTraitReturnsCorrectEnumInstance()
    {
        self::assertEquals(Status::ACTIVE, Status::fromKey('color', 'green'));
        self::assertEquals(Status::CANCELED, Status::fromKey('color', 'red'));
    }

    public function testFromKeyTraitReturnsIncorrectEnumInstance()
    {
        self::assertNotEquals(Status::ACTIVE, Status::fromKey('color', 'red'));
        self::assertNotEquals(Status::CANCELED, Status::fromKey('color', 'green'));
    }
}
