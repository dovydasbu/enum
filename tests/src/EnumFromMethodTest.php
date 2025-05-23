<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\TestEnum;
use Error;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use TypeError;

class EnumFromMethodTest extends TestCase
{
    public function test_from_key_trait_returns_correct_enum_instance()
    {
        self::assertEquals(TestEnum::FIRST_KEY, TestEnum::fromMethod('color', 'warning'));
        self::assertEquals(TestEnum::SECOND_KEY, TestEnum::fromMethod('color', 'success'));
        self::assertEquals(TestEnum::THIRD_KEY, TestEnum::fromMethod('color', 'error'));
    }

    public function test_from_key_trait_returns_incorrect_enum_instance()
    {
        self::assertNotEquals(TestEnum::FIRST_KEY, TestEnum::fromMethod('color', 'success'));
        self::assertNotEquals(TestEnum::SECOND_KEY, TestEnum::fromMethod('color', 'error'));
        self::assertNotEquals(TestEnum::THIRD_KEY, TestEnum::fromMethod('color', 'success'));
    }

    public function test_throw_runtime_exception_when_key_is_not_valid(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Value [%s] not found for key [%s] for enum class [%s]',
            $color = 'fake-color',
            $key = 'color',
            TestEnum::class,
        ));

        TestEnum::fromMethod($key, $color);
    }

    public function test_throw_type_exception_when_method_key_is_int(): void
    {
        $this->expectException(TypeError::class);

        TestEnum::fromMethod(12, 'color');
    }

    public function test_throw_type_exception_when_method_value_is_int(): void
    {
        $this->expectException(Error::class);

        TestEnum::fromMethod('fake-method', 12);
    }
}
