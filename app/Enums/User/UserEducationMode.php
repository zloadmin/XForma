<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;
use App\Enums\Traits\SelectFilterOptionable;

enum UserEducationMode: string
{
    use Arrayable;
    use Randomable;
    use SelectFilterOptionable;

    case Training = 'Training';
    case Exam = 'Exam';
    case ExamDone = 'ExamDone';

    public function label(): string
    {
        return match ($this) {
            self::Training => 'Обучение',
            self::Exam => 'Экзамен',
            self::ExamDone => 'Экзамен сдан',
        };
    }
}
