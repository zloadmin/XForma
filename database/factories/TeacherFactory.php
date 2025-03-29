<?php

namespace Database\Factories;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TeacherFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pass = static::$password ??= rand(11111, 99999);
        return [
            'email'           => fake()->safeEmail(),
            'password'        => Hash::make($pass),
            'password_unsafe' => $pass,

            'full_name'    => sprintf('%s %s %s', fake()->firstName, fake()->lastName, fake()->lastName),
            'company_name' => fake()->company,
            'job_title'    => fake()->jobTitle(),
            'note'         => fake()->realText(30),

            'role'           => UserRole::Teacher,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
