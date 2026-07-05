<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'price',
        'sessions',
        'validity',
        'sort_order',
        'active_status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sessions' => 'integer',
        'sort_order' => 'integer',
        'active_status' => 'boolean',
    ];

    public function terms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PackageTerm::class)
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderByPivot('sort_order')
            ->orderByPivot('created_at');
    }
}
