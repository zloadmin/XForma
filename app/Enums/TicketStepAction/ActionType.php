<?php

namespace App\Enums\TicketStepAction;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum ActionType: string
{
    use Arrayable, Randomable;

    case  Right = 'Right';
    case  Critical = 'Critical';
    case  Unimplementable = 'Unimplementable';
    case  Error = 'Error';


    public function label(): string
    {
        return match ($this) {
            self::Right => 'Правильное действие',
            self::Critical => 'Критическая ошибка',
            self::Unimplementable => 'Не исполнимо',
            self::Error => 'Ошибка',
        };
    }
    public function points(): int
    {
        return match ($this) {
            self::Right => 10,
            self::Critical => -20,
            self::Unimplementable => 0,
            self::Error => -10,
        };
    }
}
