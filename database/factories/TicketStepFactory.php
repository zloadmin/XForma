<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketStep>
 */
class TicketStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id'        => Ticket::factory(),
            'position'         => rand(1, 99) + rand(0, 1) ? rand(1, 5) / 10 : 0,
            'name'             => fake()->name,
            'parent_positions' => [rand(1, 99), rand(1, 99), rand(1, 99)]
        ];
    }
}
