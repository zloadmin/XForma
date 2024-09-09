<?php

namespace Database\Seeders;

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
            'email'    => 'test@test.com',
            'password' => Hash::make('password')
        ]);
        $accessToken = $user->createToken('seeder');
        $envService = new Env();
        $envService->set("SCRIBE_AUTH_KEY", $accessToken->plainTextToken);


        User::factory(10)->create();

    }
}
