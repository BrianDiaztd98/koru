<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title_en',
        'description_en',
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
