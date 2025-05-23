<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image' => 'https://www.olx.co.id/news/wp-content/uploads/2024/09/Koenigsegg-Jesko.webp',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
