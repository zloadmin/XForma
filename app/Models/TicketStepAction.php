<?php

namespace App\Models;

use App\Enums\TicketStepAction\ActionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStepAction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'type' => ActionType::class
    ];
}
