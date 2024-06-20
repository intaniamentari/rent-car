<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'sim_card'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
