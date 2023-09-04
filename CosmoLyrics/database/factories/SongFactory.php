<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->title,
            'photo' => $this->faker->imageUrl(300, 300, 'song', true),
            'description' => $this->faker->paragraph(1),
            'about' => $this->faker->sentence(30),
            'watches' => random_int(0, 10000),
            'genre_id' => random_int(1, 20),
        ];
    }
}
