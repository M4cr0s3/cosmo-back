<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Singer>
 */
class SingerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'photo' => $this->faker->imageUrl(300, 300, 'singer', true),
            'description' => $this->faker->paragraph(2),
            'biography' => $this->faker->paragraph(3),
        ];
    }
}
