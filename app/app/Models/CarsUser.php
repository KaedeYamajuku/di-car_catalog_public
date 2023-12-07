<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsUser extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'car_id',
        'user_id',
    ];
}
