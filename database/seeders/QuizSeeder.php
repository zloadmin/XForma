<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::factory(rand(20, 40))
            ->has(Question::factory()
                ->hasMedia(rand(1, 3))
                ->has(Answer::factory()->hasMedia(rand(1, 3))->count(rand(2, 4)))
                ->has(Answer::factory()->hasMedia(rand(1, 3))->count(1)->state(function () {
                    return ['is_right' => true];
                }))
                ->count(rand(20, 40)))
            ->create();
    }
}
