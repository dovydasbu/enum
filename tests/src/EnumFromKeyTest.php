<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\Status;
use PHPUnit\Framework\TestCase;

class EnumFromKeyTest extends TestCase
{
    public function test_from_key_trait_returns_correct_enum_instance()
    {
        self::assertEquals(Status::DRAFT, Status::fromKey('color', 'warning'));
        self::assertEquals(Status::ACTIVE, Status::fromKey('color', 'success'));
        self::assertEquals(Status::CANCELED, Status::fromKey('color', 'error'));
    }

    public function test_from_key_trait_returns_incorrect_enum_instance()
    {
        self::assertNotEquals(Status::DRAFT, Status::fromKey('color', 'success'));
        self::assertNotEquals(Status::ACTIVE, Status::fromKey('color', 'error'));
        self::assertNotEquals(Status::CANCELED, Status::fromKey('color', 'success'));
    }
}
