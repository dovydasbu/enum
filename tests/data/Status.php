<?php

namespace Dovydasbu\Tests\Data;

use Dovydasbu\Enum\EnumComparison;
use Dovydasbu\Enum\EnumFromKey;
use Dovydasbu\Enum\EnumToArray;

enum Status: string
{
    use EnumComparison;
    use EnumFromKey;
    use EnumToArray;

    case ACTIVE = 'active';
    case CANCELED = 'canceled';

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'green',
            self::CANCELED => 'red',
        };
    }
}
