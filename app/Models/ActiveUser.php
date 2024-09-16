<?php

namespace App\Models;

use App\Models\Scopes\User\ActiveUserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([ActiveUserScope::class])]
class ActiveUser extends User
{
    use HasFactory;

    protected $table = 'users';
}
