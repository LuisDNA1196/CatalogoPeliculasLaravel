<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'title'    => fake()->unique()->sentence(3),
            'synopsis' => fake()->paragraphs(3, true),
            'year'     => fake()->numberBetween(1980, 2025),
            'cover'    => fake()->imageUrl(640, 960, 'movie', true, 'cover'),
        ];
    }
}
