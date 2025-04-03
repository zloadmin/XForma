<?php

namespace App\Console\Commands\Import;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function data()
    {
        return [
            1  => [1, 6, 3, 18, 22],
            2  => [1, 9, 4, 16, 25],
            3  => [1, 10, 5, 19, 21],
            4  => [1, 11, 7, 20, 26],
            5  => [1, 12, 8, 17, 23],
            6  => [1, 14, 13, 16, 24],
            7  => [1, 6, 15, 18, 27],
            8  => [1, 9, 3, 19, 22],
            9  => [1, 10, 4, 17, 25],
            10 => [1, 11, 5, 20, 21],
            11 => [2, 12, 7, 16, 23],
            12 => [2, 14, 8, 17, 26],
            13 => [2, 6, 13, 19, 22],
            14 => [2, 9, 15, 18, 24],
            15 => [2, 10, 3, 20, 27],
            16 => [2, 11, 4, 17, 21],
            17 => [2, 12, 5, 19, 25],
            18 => [2, 14, 7, 16, 26],
            19 => [2, 6, 8, 18, 23],
            20 => [2, 9, 13, 20, 24],
            21 => [1],
            22 => [2],
            23 => [3],
            24 => [4],
            25 => [5],
            26 => [6],
            27 => [7],
            28 => [8],
            29 => [9],
            30 => [10],
            31 => [11],
            32 => [12],
            33 => [13],
            34 => [14],
            35 => [15],
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('task_ticket')->truncate();
        DB::table('tickets')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($this->data() as $ticketId => $taskIds) {
            $ticket = Ticket::create(['id' => $ticketId]);
            $ticket->tasks()->sync($taskIds);
        }
    }
}
