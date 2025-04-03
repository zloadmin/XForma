<?php

namespace App\Models;


use App\Enums\User\UserRandomMode;
use App\Models\Scopes\User\StudentRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ScopedBy([StudentRoleScope::class])]
class Student extends User
{
    use HasFactory;

    protected $table = 'users';

    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }

    public function teacher() : BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTicketListAttribute(): string
    {
        return implode(",", $this->tickets()->pluck('tickets.id')->toArray());
    }

    public function isRandomMode(): bool
    {

        return $this->random_mode == UserRandomMode::Yes->value;
    }
}
