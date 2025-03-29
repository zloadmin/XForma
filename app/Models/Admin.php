<?php

namespace App\Models;


use App\Enums\User\UserRole;
use App\Models\Scopes\User\AdminRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([AdminRoleScope::class])]
class Admin extends User
{
    use HasFactory;

    protected $table = 'users';
    protected $attributes = [
        'role' => UserRole::Admin,
    ];
}
