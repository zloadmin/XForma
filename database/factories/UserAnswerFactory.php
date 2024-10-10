<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\AnswerImage;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAnswer>
 */
class UserAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'         => User::factory(),
            'quiz_id'         => Quiz::factory(),
            'question_id'     => Question::factory(),
            'answer_image_id' => AnswerImage::factory(),
            'is_right'        => rand(0, 1),
            'spend_time'      => rand(1, 60 * 60)
        ];
    }
}
