<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class About extends Model
{
    protected $fillable = [
        'title',
        'philosophy',
        'vision',
        'image_1',
        'image_2',
        'image_3',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::cacheKey()));
        static::deleted(fn () => Cache::forget(self::cacheKey()));
    }

    public static function cacheKey(): string
    {
        return 'about.content';
    }

    public static function getAboutData(): array
    {
        $data = self::query()->first()?->toArray() ?? self::defaultData();
        
        // Ensure image URLs are properly formatted
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if (isset($data[$imageField]) && $data[$imageField] && !str_starts_with($data[$imageField], 'http')) {
                $data[$imageField] = str_starts_with($data[$imageField], 'img/') 
                    ? asset($data[$imageField]) 
                    : asset('storage/' . $data[$imageField]);
            }
        }
        
        return $data;
    }

    public static function defaultData(): array
    {
        return [
            'title' => 'About KORU',
            'philosophy' => 'Named after the Māori symbol for a new unfurling fern frond, Koru represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.',
            'vision' => 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.',
            'image_1' => 'img/about/therapy.jpeg',
            'image_2' => 'img/about/massage.jpeg',
            'image_3' => 'img/about/team.jpeg',
        ];
    }

    public function getImage1Url(): string
    {
        return $this->image_1 ? asset('storage/' . $this->image_1) : asset($this->image_1);
    }

    public function getImage2Url(): string
    {
        return $this->image_2 ? asset('storage/' . $this->image_2) : asset($this->image_2);
    }

    public function getImage3Url(): string
    {
        return $this->image_3 ? asset('storage/' . $this->image_3) : asset($this->image_3);
    }
}