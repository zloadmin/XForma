<?php

namespace Database\Factories;

use App\Enums\TicketStepAction\ActionType;
use App\Models\TicketStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketStepAction>
 */
class TicketStepActionFactory extends Factory
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
            'type'           => ActionType::random(),
            'name'           => fake()->name
        ];
    }
}
