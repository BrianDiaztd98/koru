<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_en',
        'description_en',
        'price',
        'sessions',
        'validity',
        'sort_order',
        'active_status',
        'discount_eligible',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sessions' => 'integer',
        'sort_order' => 'integer',
        'active_status' => 'boolean',
        'discount_eligible' => 'boolean',
    ];

    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(PackageTerm::class)
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderByPivot('sort_order')
            ->orderByPivot('created_at');
    }
}
