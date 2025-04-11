<?php

declare(strict_types=1);

namespace Dovydasbu\Enum;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toArray(?string $valueMethod = null): array
    {
        if (! $valueMethod) {
            return array_combine(self::values(), self::names());
        }

        foreach (self::cases() as $case) {
            $values[] = $case->$valueMethod();
        }

        return array_combine(self::values(), $values ?? []);
    }

    public static function toArrayWithoutKey(?string $valueMethod = null): array
    {
        if (! $valueMethod) {
            return self::values();
        }

        foreach (self::cases() as $case) {
            $values[] = $case->$valueMethod();
        }

        return $values ?? [];
    }
}
