<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum UserEducationMode: string
{
    use Arrayable;
    use Randomable;

    case Training = 'Training';
    case Exam = 'Exam';

    public function label(): string
    {
        return match ($this) {
            self::Training => 'Обучение',
            self::Exam => 'Экзамен',
        };
    }
}
