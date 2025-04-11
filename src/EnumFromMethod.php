<?php

declare(strict_types=1);

namespace Dovydasbu\Enum;

use RuntimeException;

trait EnumFromMethod
{
    public static function fromMethod(string $method, mixed $value): ?self
    {
        foreach (self::cases() as $case) {
            $caseValue = $case->$method();

            if ($caseValue === $value) {
                return $case;
            }
        }

        throw new RuntimeException(sprintf(
            'Value [%s] not found for key [%s] for enum class [%s]',
            $value,
            $method,
            self::class
        ));
    }
}
