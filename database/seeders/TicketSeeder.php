<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketStep;
use App\Models\TicketStepAction;
use App\Models\TicketStepStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('app:init-first-ticket');

        Ticket::factory(rand(10, 15))
            ->has(TicketStep::factory()
                ->hasActions(rand(3,5))
                ->has(TicketStepStatus::factory()->count(1)->state(function () {
                    return ['is_active' => true];
                }), 'statuses')->has(TicketStepStatus::factory()->count(rand(2,4))->state(function () {
                    return ['is_active' => false];
                }), 'statuses')

                ->count(rand(5,10)), 'steps')->create();
//        Ticket::factory(rand(10, 15))
//            ->hasSteps(TicketStep::factory()

//                ->hasActions()
//            )->create();
    }
}
