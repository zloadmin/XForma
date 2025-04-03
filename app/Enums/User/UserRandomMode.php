<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;
use App\Enums\Traits\SelectFilterOptionable;

enum UserRandomMode: string
{
    use Arrayable;
    use Randomable;
    use SelectFilterOptionable;

    case Yes = 'Yes';
    case No = 'No';

    public function label(): string
    {
        return match ($this) {
            self::Yes => 'Да',
            self::No => 'Нет',
        };
    }
}
