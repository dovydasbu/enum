<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\Status;
use PHPUnit\Framework\TestCase;

class EnumToArrayTest extends TestCase
{
    public function test_names_method()
    {
        self::assertEquals([
            'DRAFT',
            'ACTIVE',
            'CANCELED',
        ], Status::names());
    }

    public function test_values_method()
    {
        self::assertEquals([
            'draft',
            'active',
            'canceled',
        ], Status::values());
    }

    public function test_array_method()
    {
        self::assertEquals([
            'draft' => 'DRAFT',
            'active' => 'ACTIVE',
            'canceled' => 'CANCELED',
        ], Status::array());
    }

    public function test_to_array_by_key_method_with_existing_keys()
    {
        self::assertEquals([
            'draft' => 'warning',
            'active' => 'success',
            'canceled' => 'error',
        ], Status::array('color'));
    }

    public function test_to_array_by_key_method_without_existing_keys()
    {
        self::assertEquals([
            'warning',
            'success',
            'error',
        ], Status::toArrayByKey('color'));
    }
}
