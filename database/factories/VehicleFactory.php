<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'plate_number' => fake()->regexify('[A-Z]{3}[0-9]{4}'),
            'color' => fake()->colorName(),
            'year' => fake()->year(),
            'brand' => fake()->company(),
            'model' => fake()->word(),
            'user_id' => User::all()->count() > 0 ? 
                User::all()->random()->id : 
                User::factory()->create()->id,
        ];
    }
}
