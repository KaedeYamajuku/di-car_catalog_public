<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'cc',
        'sales_date',
        'memo',
        'image_url',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
