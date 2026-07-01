<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTerm extends Model
{
    protected $fillable = [
        'content',
        'sort_order',
        'active_status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'active_status' => 'boolean',
    ];
}
