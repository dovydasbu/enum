<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\Status;
use PHPUnit\Framework\TestCase;

class EnumComparisonTest extends TestCase
{
    public function testTraitComparesItselfCorrectly()
    {
        self::assertTrue(Status::ACTIVE->is(Status::ACTIVE));
        self::assertTrue(Status::CANCELED->is(Status::CANCELED));
    }

    public function testTraitComparesItselfIncorrectly()
    {
        self::assertFalse(Status::ACTIVE->is(Status::CANCELED));
        self::assertFalse(Status::CANCELED->is(Status::ACTIVE));
    }
}
