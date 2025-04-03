<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->orderBy('id');
    }

    public function getNameAttribute()
    {
        return sprintf('Билет №' . $this->id);
    }
}
