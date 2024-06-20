<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $tables = 'vehicles';

    protected $fillable = [
        'brand',
        'model',
        'vehicle_number',
        'charge',
        'available'
    ];

    public function rentCars()
    {
        return $this->hasMany(RentCar::class);
    }
}
