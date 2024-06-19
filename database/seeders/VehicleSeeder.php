<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'vehicle_number' => 'ABC123',
                'charge' => 500.00,
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'vehicle_number' => 'XYZ456',
                'charge' => 600.00,
            ],
            [
                'brand' => 'Ford',
                'model' => 'Focus',
                'vehicle_number' => 'DEF789',
                'charge' => 550.00,
            ],
            [
                'brand' => 'Chevrolet',
                'model' => 'Malibu',
                'vehicle_number' => 'GHI012',
                'charge' => 620.00,
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Altima',
                'vehicle_number' => 'JKL345',
                'charge' => 570.00,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
