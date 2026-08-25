<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutGlanceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'order',
        'title',
        'description',
    ];

    protected $casts = [
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
