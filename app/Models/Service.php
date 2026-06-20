<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'price',
        'duration',
        'image_path',
        'category',
        'active_status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active_status' => 'boolean',
    ];
}
