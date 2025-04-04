<?php

namespace Database\Factories;

use App\Models\Result;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResultTask>
 */
class ResultTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'result_id'         => Result::query()->inRandomOrder()->first()->id,
            'task_id'           => Task::query()->inRandomOrder()->first()->id,
            'point_accuracy'    => rand(0, 5),
            'point_consistency' => rand(0, 5),
        ];
    }
}
