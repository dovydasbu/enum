<?php

declare(strict_types=1);

namespace Dovydasbu\Enum;

use RuntimeException;

trait EnumFromKey
{
    public static function fromKey(string $key, mixed $value): ?self
    {
        foreach (self::cases() as $case) {
            $caseValue = $case->$key();

            if ($caseValue === $value) {
                return $case;
            }
        }

        throw new RuntimeException(sprintf(
            'Value [%s] not found for key [%s] for enum class [%s]',
            $value,
            $key,
            self::class
        ));
    }
}
