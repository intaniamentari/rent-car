<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "admins";

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
