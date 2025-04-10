<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\TestEnum;
use PHPUnit\Framework\TestCase;
use TypeError;

class EnumComparisonTest extends TestCase
{
    public function test_trait_compares_itself_correctly()
    {
        self::assertTrue(TestEnum::FIRST_KEY->is(TestEnum::FIRST_KEY));
        self::assertTrue(TestEnum::SECOND_KEY->is(TestEnum::SECOND_KEY));
        self::assertTrue(TestEnum::THIRD_KEY->is(TestEnum::THIRD_KEY));
    }

    public function test_trait_compares_itself_incorrectly()
    {
        self::assertFalse(TestEnum::FIRST_KEY->is(TestEnum::SECOND_KEY));
        self::assertFalse(TestEnum::SECOND_KEY->is(TestEnum::THIRD_KEY));
        self::assertFalse(TestEnum::THIRD_KEY->is(TestEnum::FIRST_KEY));
    }

    public function test_throws_error_if_string_is_presented(): void
    {
        $this->expectException(TypeError::class);

        TestEnum::FIRST_KEY->is('fake-enum');
    }

    public function test_throws_error_if_int_is_presented(): void
    {
        $this->expectException(TypeError::class);

        TestEnum::FIRST_KEY->is(12);
    }
}
