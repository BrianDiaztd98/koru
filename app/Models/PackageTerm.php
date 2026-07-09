<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class)
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderByPivot('sort_order')
            ->orderByPivot('created_at');
    }
}
