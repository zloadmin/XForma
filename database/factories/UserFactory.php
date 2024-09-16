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
class UserFactory extends Factory
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
        return [
            'username'       => fake()->name,
            'full_name'      => sprintf('%s %s %s', fake()->firstName, fake()->lastName, fake()->lastName),
            'age'            => rand(1, 100),
            'company_name'   => fake()->company,
            'job_title'      => fake()->jobTitle(),
            'note'           => fake()->realText(),
            'education_mode' => UserEducationMode::random(),
            'role'           => UserRole::random(),
            'is_active'      => rand(0, 1),
            'password'       => static::$password ??= Hash::make('password'),
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
