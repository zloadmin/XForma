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
            'email'           => 'admin@admin.com',
            'password'        => Hash::make('admin@admin.com'),
            'password_unsafe' => 'admin@admin.com',
            'full_name'       => 'Админ',
            'role'            => UserRole::Admin,
        ]);
        $accessToken = $user->createToken('seeder');
        $envService = new Env();
        $envService->set("SCRIBE_AUTH_KEY", $accessToken->plainTextToken);
//        User::factory()->create([
//            'email'     => 'student@student.com',
//            'password'  => Hash::make('student@student.com'),
//            'full_name' => 'Студент',
//            'role'      => UserRole::Student,
//        ]);

//        User::factory(10)->create();
        Teacher::factory(1)
            ->has(Student::factory()->count(1))
            ->create();
        Teacher::factory(2)
            ->has(Student::factory()->count(2))
            ->create();
    }
}
