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

    public static function array(?string $valueKey = null): array
    {
        if (! $valueKey) {
            return array_combine(self::values(), self::names());
        }

        foreach (self::cases() as $case) {
            $values[] = $case->$valueKey();
        }

        return array_combine(self::values(), $values ?? []);
    }

    public static function toArrayByKey(string $key): array
    {
        foreach (self::cases() as $case) {
            $values[] = $case->$key();
        }

        return $values ?? [];
    }

    public static function toSelectArray(?string $titleKey = null): array
    {
        $values = [];

        foreach (self::cases() as $case) {
            $values[] = [
                'id' => $case->value,
                'label' => $titleKey ? $case->$titleKey() : $case->name,
                'is_priority' => false,
                'icon' => method_exists($case, 'icon') ? $case->icon() : null,
            ];
        }

        return $values;
    }
}
