<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

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

    public function test_array_method()
    {
        self::assertEquals([
            'first-value' => 'FIRST_KEY',
            'second-value' => 'SECOND_KEY',
            'third-value' => 'THIRD_KEY',
        ], TestEnum::array());
    }

    public function test_to_array_by_key_method_with_existing_keys()
    {
        self::assertEquals([
            'first-value' => 'warning',
            'second-value' => 'success',
            'third-value' => 'error',
        ], TestEnum::array('color'));
    }

    public function test_to_array_by_key_method_without_existing_keys()
    {
        self::assertEquals([
            'warning',
            'success',
            'error',
        ], TestEnum::toArrayByKey('color'));
    }
}
