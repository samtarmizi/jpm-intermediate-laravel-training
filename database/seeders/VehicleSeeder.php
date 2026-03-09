<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'name' => 'My Dream Car',
            'plate_number' => '1234567890',
            'color' => 'Red',
            'year' => 2024,
            'brand' => 'Toyota',
            'model' => 'Corolla',
        ]);
    }
}
