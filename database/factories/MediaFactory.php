<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $file = rand(1, 3) . '.jpg';
        return [
            'path'          => 'media/' . $file,
            'original_name' => $file,
            'size'          => rand(10000, 9999999)
        ];
    }
}
