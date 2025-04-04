<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\Admin;
use App\Models\Result;
use App\Models\ResultTask;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Database\Factories\ResultTaskFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use SoulDoit\SetEnv\Env;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result::factory(3)
            ->create();

        ResultTask::factory(30)->create();
    }
}
