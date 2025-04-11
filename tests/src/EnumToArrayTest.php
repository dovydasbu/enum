<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\EmptyTestEnum;
use Dovydasbu\Tests\Data\TestEnum;
use PHPUnit\Framework\TestCase;

class EnumToArrayTest extends TestCase
{
    public function test_names_method()
    {
        self::assertEquals([
            'FIRST_KEY',
            'SECOND_KEY',
            'THIRD_KEY',
        ], TestEnum::names());
    }

    public function test_values_method()
    {
        self::assertEquals([
            'first-value',
            'second-value',
            'third-value',
        ], TestEnum::values());
    }

    public function test_to_array_method()
    {
        self::assertEquals([
            'first-value' => 'FIRST_KEY',
            'second-value' => 'SECOND_KEY',
            'third-value' => 'THIRD_KEY',
        ], TestEnum::toArray());
    }

    public function test_to_array_method_with_value_method()
    {
        self::assertEquals([
            'first-value' => 'warning',
            'second-value' => 'success',
            'third-value' => 'error',
        ], TestEnum::toArray('color'));
    }

    public function test_to_array_method_with_value_method_with_empty_enum()
    {
        self::assertEquals([], EmptyTestEnum::toArray('color'));
    }

    public function test_to_array_without_key_method_without_existing_keys()
    {
        self::assertEquals([
            'warning',
            'success',
            'error',
        ], TestEnum::toArrayWithoutKey('color'));
    }

    public function test_to_array_without_key_method_without_value_method()
    {
        self::assertEquals([
            'first-value',
            'second-value',
            'third-value',
        ], TestEnum::toArrayWithoutKey());
    }

    public function test_to_array_without_key_method_without_empty_enum()
    {
        self::assertEquals([], EmptyTestEnum::toArrayWithoutKey('no-values'));
    }
}
