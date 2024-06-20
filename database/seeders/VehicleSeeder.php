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
                'mileage' => 40000,
                'transmission' => 'Manual',
                'seats' => 5,
                'lunggage' => 4,
                'fuel' => 'Petrol'
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'vehicle_number' => 'XYZ456',
                'charge' => 600.00,
                'mileage' => 40000,
                'transmission' => 'Manual',
                'seats' => 5,
                'lunggage' => 4,
                'fuel' => 'Petrol'
            ],
            [
                'brand' => 'Ford',
                'model' => 'Focus',
                'vehicle_number' => 'DEF789',
                'charge' => 550.00,
                'mileage' => 44000,
                'transmission' => 'Matic',
                'seats' => 4,
                'lunggage' => 5,
                'fuel' => 'Petrol'
            ],
            [
                'brand' => 'Chevrolet',
                'model' => 'Malibu',
                'vehicle_number' => 'GHI012',
                'charge' => 620.00,
                'mileage' => 44000,
                'transmission' => 'Matic',
                'seats' => 4,
                'lunggage' => 4,
                'fuel' => 'Petrol'
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Altima',
                'vehicle_number' => 'JKL345',
                'charge' => 570.00,
                'mileage' => 50000,
                'transmission' => 'Manual',
                'seats' => 6,
                'lunggage' => 3,
                'fuel' => 'Petrol'
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
