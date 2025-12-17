<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeatherLog>
 */
class WeatherLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_name' => $this->faker->randomElement(['London', 'Paris', 'Berlin', 'Tokyo', 'Delhi', 'Mumbai']),
            'temperature' => $this->faker->numberBetween(-5, 40),

            'condition' => $this->faker->words(3, true),

            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
