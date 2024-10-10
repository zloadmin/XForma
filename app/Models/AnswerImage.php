<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnswerImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUrl() : string
    {
        return Storage::url($this->path);
    }

    public function getClientOriginalName(): string
    {
        return $this->original_name;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
