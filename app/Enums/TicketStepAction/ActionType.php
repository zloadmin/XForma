<?php

namespace App\Enums\TicketStepAction;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum ActionType: string
{
    use Arrayable, Randomable;

    case  Right = 'Right'; //Правильное действие
    case  Critical = 'Critical'; //Критическая ошибка
    case  Unimplementable = 'Unimplementable'; //Не исполнимо
    case  Error = 'Error'; //Ошибка                                -
}
