<?php

namespace App\Models;

use App\Enums\User\UserEducationMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'is_success' => 'integer',
        'ticket_id'  => 'integer',
        'education_mode' => UserEducationMode::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function resultTasks(): HasMany
    {
        return $this->hasMany(ResultTask::class, 'result_id', 'id');
    }
}
