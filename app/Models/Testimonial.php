<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'video_path',
        'video_url',
        'image_path',
        'author_name',
        'author_role',
        'quote_en',
        'quote_es',
        'active_status',
    ];

    protected $casts = [
        'active_status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active_status', true);
    }
}
