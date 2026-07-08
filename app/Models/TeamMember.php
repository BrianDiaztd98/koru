<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'instagram_handle',
        'bio_en',
        'specialty_en',
        'image_path',
        'active_status',
    ];

    protected $casts = [
        'active_status' => 'boolean',
    ];
}
