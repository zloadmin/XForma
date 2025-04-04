<?php

namespace Database\Factories;

use App\Enums\User\UserEducationMode;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'ticket_id' => Ticket::query()->inRandomOrder()->first()->id,
            'education_mode' => UserEducationMode::random(),
            'is_success' => rand(0, 1),
        ];
    }
}
