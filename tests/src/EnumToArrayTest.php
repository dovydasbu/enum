<?php

declare(strict_types=1);

namespace Dovydasbu\tests\src;

use Dovydasbu\Tests\Data\Status;
use PHPUnit\Framework\TestCase;

class EnumToArrayTest extends TestCase
{
    public function testNamesMethod()
    {
        self::assertEquals([
            'ACTIVE',
            'CANCELED',
        ], Status::names());
    }

    public function testValuesMethod()
    {
        self::assertEquals([
            'active',
            'canceled',
        ], Status::values());
    }

    public function testArrayMethod()
    {
        self::assertEquals([
            'active' => 'ACTIVE',
            'canceled' => 'CANCELED',
        ], Status::array());
    }

    public function testToArrayByKeyMethodWithExistingKeys()
    {
        self::assertEquals([
            'active' => 'green',
            'canceled' => 'red',
        ], Status::array('color'));
    }

    public function testToArrayByKeyMethodWithoutExistingKeys()
    {
        self::assertEquals([
            'green',
            'red',
        ], Status::toArrayByKey('color'));
    }
}
