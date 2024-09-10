<?php

namespace App\Models;

use App\Models\Media\Mediable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    use Mediable;

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
