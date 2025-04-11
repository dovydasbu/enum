<?php

namespace Dovydasbu\Tests\Data;

use Dovydasbu\Enum\EnumComparison;
use Dovydasbu\Enum\EnumFromKey;
use Dovydasbu\Enum\EnumToArray;

enum EmptyTestEnum: string
{
    use EnumComparison;
    use EnumFromKey;
    use EnumToArray;
}
