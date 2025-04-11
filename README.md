# Enum Traits

This repository contains a set of reusable PHP traits that extend the functionality of PHP enums. They are designed to help you easily compare enum cases, create enums from key values, and convert enums to array representations.

> **Requirements:** PHP 8.1 or higher (enums are natively supported from PHP 8.1).

---

## Available Traits

### EnumComparison

- **Purpose:** Provides a simple method to compare two enum cases.
- **Method:**
    - `is(self $enum): bool`  
      Returns `true` if the current enum instance is exactly the same as the provided enum instance.

### EnumFromKey

- **Purpose:** Enables creating an enum instance from a given key and value.
- **Method:**
    - `fromKey(string $key, mixed $value): ?self`  
      Iterates through all enum cases using `self::cases()`, calls the method defined by `$key` on each case, and returns the enum case if the returned value matches `$value`.  
      Throws a `RuntimeException` if no matching case is found.

### EnumToArray

- **Purpose:** Provides various methods to convert enum cases to array formats.
- **Methods:**
    - `names(): array`  
      Returns an array of the enum case names.

    - `values(): array`  
      Returns an array of the enum case values.

    - `toArray(?string $valueMethod = null): array`  
      Returns an associative array where keys are enum values.
        - Without a `$valueMethod`, the array keys are enum values and the values are enum names.
        - With a `$valueMethod`, the trait calls that method on each case to get the matching value.

    - `toArrayWithoutKey(?string $valueMethod = null): array`  
      Returns a plain array of values.
        - Without a `$valueMethod`, the array contains the enum values.
        - With a `$valueMethod`, the trait calls that method on each case to get the corresponding values.

---

## Usage Example

Below is an example of how you can use these traits with a PHP enum:

```php
<?php

namespace App\Enums;

use Dovydasbu\Enum\EnumComparison;
use Dovydasbu\Enum\EnumFromMethod;
use Dovydasbu\Enum\EnumToArray;

enum Status: string
{
    use EnumComparison;
    use EnumFromMethod;
    use EnumToArray;

    case ACTIVE = 'active';
    case PARTIAL_SUCCESS = 'partial-success';
    case INACTIVE = 'inactive';

    // Define a custom method to return a matching values.
    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::PARTIAL_SUCCESS => 'warning',
            self::INACTIVE => 'error',
        };
    }
}

// Comparison usage
$status = Status::ACTIVE;
if ($status->is(Status::ACTIVE)) {
    echo "The status is active.";
}

// Get enum from specific

// Converting enums to arrays
$names = Status::names();               // [ 'ACTIVE', 'PARTIAL_SUCCESS', 'INACTIVE' ]
$values = Status::values();             // [ 'active', 'partial-success', 'inactive' ]
$assocArray = Status::toArray('color');      // [ 'active' => 'success', 'partial-success' => 'warning', 'inactive' => 'error' ]
$simpleArray = Status::toArrayWithoutKey('color'); // [ 'active', 'partial-success', 'inactive' ] or based on customValue method output
```