<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'badge' => 'PAIN FREE, BETTER LIFE.',
                'title_line_1' => 'Wellness, Therapy',
                'title_line_2' => '& Education',
                'description' => 'KORU Center brings together clinical care, recovery therapies, wellness services, and continuing education in a structured environment designed to help people move better, recover stronger, and live well.',
                'btn_primary_text' => 'Learn About KORU',
                'btn_primary_url' => '#about-us',
                'btn_secondary_text' => 'Explore Services',
                'btn_secondary_url' => '#services',
                'image_path' => 'img/carrucel/relaxing.webp',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'badge' => 'Advanced Recovery',
                'title_line_1' => 'Sport Recovery',
                'title_line_2' => 'Therapy',
                'description' => 'A performance-focused session combining assisted stretching, myofascial release, percussion therapy, and targeted mobility techniques to accelerate recovery and restore optimal movement.',
                'btn_primary_text' => 'Explore Sport Recovery',
                'btn_primary_url' => '#services',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image_path' => 'img/services/Sport_Recovery.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'badge' => 'Total Regeneration',
                'title_line_1' => 'Super',
                'title_line_2' => 'Recovery',
                'description' => 'A 90-minute recovery experience combining full-body therapeutic massage, red light therapy, and cold plunge cryotherapy to reduce muscle fatigue and leave you recharged.',
                'btn_primary_text' => 'Book Super Recovery',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image_path' => 'img/carrucel/luzroja.webp',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::query()->updateOrCreate(
                ['sort_order' => $slide['sort_order']],
                $slide
            );
        }
    }
}
