<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title_en',
        'title_es',
        'description_en',
        'description_es',
        'ce_credits',
        'date',
        'price',
        'active_status',
    ];

    protected $casts = [
        'date' => 'date',
        'price' => 'decimal:2',
        'active_status' => 'boolean',
    ];
}
