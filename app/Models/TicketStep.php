<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketStep extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'parent_positions' => 'json',
        'position' => 'double'
    ];

    public function statuses(): HasMany
    {
        return $this->hasMany(TicketStepStatus::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(TicketStepAction::class);
    }
}
