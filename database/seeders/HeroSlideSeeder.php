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
                'badge' => 'Wellness & Performance',
                'title_line_1' => 'Relaxing Massage',
                'title_line_2' => 'Total Recovery',
                'description' => 'Advanced therapeutic techniques designed to relieve muscle tension, reduce stress levels, and significantly improve joint mobility.',
                'btn_primary_text' => 'Book a Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image_path' => 'img/carrucel/relaxing.webp',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'badge' => 'Advanced Recovery',
                'title_line_1' => 'Normatec',
                'title_line_2' => 'Technology',
                'description' => 'Dynamic sequential compression bio-mechanisms to optimize blood flow, accelerate muscle clearance, and reduce inflammation effortlessly.',
                'btn_primary_text' => 'Book No Hands Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image_path' => 'img/carrucel/normatec.webp',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'badge' => 'Total Regeneration',
                'title_line_1' => 'Super',
                'title_line_2' => 'Recovery Protocol',
                'description' => 'Synergistic red light therapy and cold plunge contrast routines engineered for deep cellular regeneration and elite performance.',
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
            HeroSlide::query()->create($slide);
        }
    }
}
