<?php

namespace Dovydasbu\Tests\Data;

use Dovydasbu\Enum\EnumComparison;
use Dovydasbu\Enum\EnumFromMethod;
use Dovydasbu\Enum\EnumToArray;

enum EmptyTestEnum: string
{
    use EnumComparison;
    use EnumFromMethod;
    use EnumToArray;
}
