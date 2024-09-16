<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];
    const UPDATED_AT = null;
    protected $casts = [
        'spend_time' => 'integer'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * Scope a query to only include quiz.
     */
    public function scopeQuiz($query, Quiz $quiz)
    {
        return $query->where('quiz_id', $quiz->id);
    }

    /**
     * Scope a query to only include question.
     */
    public function scopeQuestion($query, Question $question)
    {
        return $query->where('question_id', $question->id);
    }

    /**
     * Scope a query to only include answer.
     */
    public function scopeAnswer($query, Answer $answer)
    {
        return $query->where('answer_id', $answer->id);
    }

    /**
     * Scope a query to only include user.
     */
    public function scopeUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
