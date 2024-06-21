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
                'charge' => 50000,
                'mileage' => 40000,
                'transmission' => 'Manual',
                'seats' => 5,
                'lunggage' => 4,
                'fuel' => 'Petrol',
                'image' => 'storage/uploads/car-1.jpg'
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'vehicle_number' => 'XYZ456',
                'charge' => 60000,
                'mileage' => 40000,
                'transmission' => 'Manual',
                'seats' => 5,
                'lunggage' => 4,
                'fuel' => 'Petrol',
                'image' => 'storage/uploads/car-2.jpg'
            ],
            [
                'brand' => 'Ford',
                'model' => 'Focus',
                'vehicle_number' => 'DEF789',
                'charge' => 55000,
                'mileage' => 44000,
                'transmission' => 'Matic',
                'seats' => 4,
                'lunggage' => 5,
                'fuel' => 'Petrol',
                'image' => 'storage/uploads/car-3.jpg'
            ],
            [
                'brand' => 'Chevrolet',
                'model' => 'Malibu',
                'vehicle_number' => 'GHI012',
                'charge' => 62000,
                'mileage' => 44000,
                'transmission' => 'Matic',
                'seats' => 4,
                'lunggage' => 4,
                'fuel' => 'Petrol',
                'image' => 'storage/uploads/car-4.jpg'
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Altima',
                'vehicle_number' => 'JKL345',
                'charge' => 57000,
                'mileage' => 50000,
                'transmission' => 'Manual',
                'seats' => 6,
                'lunggage' => 3,
                'fuel' => 'Petrol',
                'image' => 'storage/uploads/car-5.jpg'
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
