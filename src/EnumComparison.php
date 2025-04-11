<?php

declare(strict_types=1);

namespace Dovydasbu\Enum;

trait EnumComparison
{
    public function is(self $enum): bool
    {
        return $this === $enum;
    }
}
