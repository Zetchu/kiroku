<?php

namespace Database\Factories;

use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'series_id' => Series::factory(),
            'status' => $this->faker->randomElement(['Watching', 'Completed', 'Plan to Watch']),
            'rating' => $this->faker->numberBetween(1, 10),
            'progress' => $this->faker->numberBetween(1, 12),
        ];
    }
}
