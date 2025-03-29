<?php

namespace App\Models;


use App\Models\Scopes\User\StudentRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([StudentRoleScope::class])]
class Student extends User
{
    use HasFactory;
    protected $table = 'users';
}
