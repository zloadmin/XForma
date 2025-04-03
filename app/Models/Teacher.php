<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use App\Models\Scopes\User\TeacherRoleScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[ScopedBy(TeacherRoleScope::class)]
class Teacher extends User
{
    use HasFactory;

    protected $table = 'users';
    protected $attributes = [
        'role' => UserRole::Teacher,
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function getStudentIdsAttribute(): array
    {
        return $this->students()->pluck('id')->toArray();
    }
}
