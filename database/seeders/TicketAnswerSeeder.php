<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketAnswer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);
        $ticket = Ticket::find(1);
        foreach ($ticket->steps()->get() as $step) {
            $action = $step->actions()->inRandomOrder()->first();
            TicketAnswer::create([
               'user_id' => $user->id,
               'ticket_id' => $ticket->id,
               'ticket_step_id' => $step->id,
               'ticket_step_action_id' => $action->id,
               'ticket_step_action_type' => $action->type,
               'points' => $action->type->points(),

            ]);
        }
    }
}
