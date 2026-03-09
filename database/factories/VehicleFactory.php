<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'My Dream Car '. fake()->unique()->word(),
            'plate_number' => fake()->randomNumber(8),
            'color' => fake()->colorName(),
            'year' => fake()->year(),
            'brand' => fake()->company(),
            'model' => fake()->word(),
        ];
    }
}
