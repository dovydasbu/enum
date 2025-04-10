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

    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case CANCELED = 'canceled';

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'warning',
            self::ACTIVE => 'success',
            self::CANCELED => 'error',
        };
    }
}
