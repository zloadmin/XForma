<?php

namespace Database\Factories;

use App\Models\TicketStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketStepStatus>
 */
class TicketStepStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_step_id' => TicketStep::factory(),
            'name'           => fake()->name,
            'is_active'      => rand(0, 1)
        ];
    }
}
