<?php

declare(strict_types=1);

namespace App\Enums\Traits;

use BackedEnum;
use RuntimeException;
use UnitEnum;

trait Randomable
{
    use Arrayable;

    static function random()
    {
        return self::values()[rand(0, count(self::values()) - 1)];
    }

    static function randomCase(): static
    {
        return self::cases()[rand(0, count(self::cases()) - 1)];
    }

    /**
     * @throws RuntimeException
     */
    static function randomCaseExcept(UnitEnum ...$exceptCases): static
    {
        if (count(self::cases()) <= count($exceptCases)) {
            throw new RuntimeException('Except cases count should be less than all cases count');
        }

        $allowedCases = [];

        foreach (self::cases() as $case) {
            if (in_array($case, $exceptCases)) {
                continue;
            }

            $allowedCases[] = $case;
        }

        return $allowedCases[rand(0, count($allowedCases) - 1)];
    }
}
