<?php

namespace App\Models;

use App\Services\AdminMediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_en',
        'description_en',
        'price',
        'duration',
        'image_path',
        'category',
        'active_status',
        'discount_eligible',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active_status' => 'boolean',
        'discount_eligible' => 'boolean',
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
