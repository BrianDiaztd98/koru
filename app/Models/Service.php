<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Services\AdminMediaService;

class Service extends Model
{
    use HasFactory;

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

    public static function categories(): array
    {
        return [
            'manual_therapy' => 'Massage Services',
            'recovery_performance' => 'Therapy Services',
            'medical_services' => 'Medical Services',
            'koru_at_home' => 'Koru At Home',
            'booster_shots' => 'Booster Shots',
            'iv_therapy' => 'IV Therapy',
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        return AdminMediaService::resolveImageUrl($this->image_path);
    }

    public function getCategoryLabelAttribute(): string
    {
        return static::categories()[$this->category] ?? ucfirst(str_replace('_', ' ', $this->category));
    }
}
