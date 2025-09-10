<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(1, 1000),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => $this->faker->numberBetween(1, 100),
            'client_id' => $this->faker->numberBetween(1, 1000),
            'start_time' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'end_time' => $this->faker->dateTimeBetween('+1 hour', '+2 months'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
