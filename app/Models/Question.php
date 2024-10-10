<?php

namespace App\Models;

use App\Models\Media\Mediable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
//    use Mediable;

    protected $guarded = [];

//    public function answers(): HasMany
//    {
//        return $this->hasMany(Answer::class);
//    }

    public function answerImages(): HasMany
    {
        return $this->hasMany(AnswerImage::class);
    }

    public function unsetRightAnswerImage(): void
    {
        $this->answerImages()->update(['is_right' => false]);
    }

    /**
     * Index start from 0. So we must skip index items and take first.
     *
     * @param int $index
     * @return void
     */
    public function setRightAnswerImageByIndex(int $index): void
    {
        $answerImage = $this->answerImages()->orderBy('id')->skip($index)->first();
        if ($answerImage) {
            $answerImage->update(['is_right' => true]);
        }
    }

    public function updateRightAnswerImageByIndex(int $index): void
    {
        $this->unsetRightAnswerImage();
        $this->setRightAnswerImageByIndex($index);
    }
}
