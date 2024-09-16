<?php

namespace App\Models;

use App\Models\Media\Mediable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    use Mediable;
    protected $guarded = [];
}
