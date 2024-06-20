<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentCar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rent_cars';

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'start_rent',
        'end_rent',
        'unit_price',
        'total_price',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
