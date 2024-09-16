<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;
use App\Enums\Traits\SelectFilterOptionable;

enum UserRole: string
{
    use Arrayable;
    use Randomable;
    use SelectFilterOptionable;

    case Student = 'Student';
    case Teacher = 'Teacher';
    case Admin = 'Admin';
    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Администратор',
            self::Teacher => 'Преподаватель',
            self::Student => 'Обучающийся',
        };
    }
}
