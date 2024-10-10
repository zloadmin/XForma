<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerImage>
 */
class AnswerImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id'   => Question::factory(),
            'path'          => sprintf('answer_images/%d.jpg', rand(1, 3)),
            'original_name' => sprintf('%d.jpg', rand(1, 3)),
            'size'          => 72202,
            'is_right'      => false,
        ];
    }
}
