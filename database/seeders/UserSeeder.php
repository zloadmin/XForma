<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use SoulDoit\SetEnv\Env;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username'  => 'admin',
            'password'  => Hash::make('admin'),
            'is_active' => true,
            'full_name'      => 'Иванов Иван Иванович',
            'role'      => UserRole::Admin,
        ]);
        $accessToken = $user->createToken('seeder');
        $envService = new Env();
        $envService->set("SCRIBE_AUTH_KEY", $accessToken->plainTextToken);
        User::factory()->create([
            'username'  => 'user',
            'password'  => Hash::make('user'),
            'is_active' => true,
            'full_name'      => 'Иванов Иван Иванович',
            'role'      => UserRole::Student,
        ]);

        User::factory(10)->create();

    }
}
