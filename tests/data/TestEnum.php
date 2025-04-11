<?php

namespace Dovydasbu\Tests\Data;

use Dovydasbu\Enum\EnumComparison;
use Dovydasbu\Enum\EnumFromMethod;
use Dovydasbu\Enum\EnumToArray;

enum TestEnum: string
{
    use EnumComparison;
    use EnumFromMethod;
    use EnumToArray;

    case FIRST_KEY = 'first-value';
    case SECOND_KEY = 'second-value';
    case THIRD_KEY = 'third-value';

    public function color(): string
    {
        return match ($this) {
            self::FIRST_KEY => 'warning',
            self::SECOND_KEY => 'success',
            self::THIRD_KEY => 'error',
        };
    }
}
