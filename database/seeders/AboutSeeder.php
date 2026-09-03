<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        About::query()->delete();

        $about = About::query()->create([
            'title' => 'About KORU',
            'subtitle' => 'Bridging the gap between recovery, movement, and education',
            'description' => 'Therapy, recovery, and professional education in Miami, under one roof.',
            'philosophy' => "Koru is the Māori symbol of the unfurling fern frond — new life, growth, and forward movement. It's the name we chose because it's what we want for every person who walks in.",
            'vision' => 'KORU is a therapy, recovery, and professional education center in Miami. We combine clinical massage therapy, advanced recovery technologies, IV therapy, and continuing education for practitioners — under one roof, with real clinical standards behind each service.',
            'mission' => 'Care here is led by licensed professionals with backgrounds in physiotherapy and orthopedic manual therapy. Structured protocols, clear communication, and honest expectations about what each treatment can do.',
            'feature_1_title' => 'Wellness & Therapy',
            'feature_1_description' => 'Tailored operational architectures built for fluid content management and clean UI stability.',
            'feature_2_title' => 'Advanced Education',
            'feature_2_description' => 'Empowering specialists through interactive workshops and fully scalable learning data tracks.',
            'image_1' => 'img/about/therapy.webp',
            'image_2' => 'img/about/massage.webp',
            'image_3' => 'img/about/team.webp',
            'image_4' => 'img/services/relaxingMen.webp',
        ]);

        $glanceItems = [
            [
                'order' => 1,
                'title' => 'What we offer',
                'description' => 'Clinical massage therapy, recovery technologies, IV therapy and booster shots, KORU at Home, and continuing education for professionals.',
            ],
            [
                'order' => 2,
                'title' => 'Who we work with',
                'description' => 'People living with pain or tension, active people focused on recovery, and practitioners looking to expand their clinical skills.',
            ],
            [
                'order' => 3,
                'title' => 'Why KORU',
                'description' => 'Licensed Massage Therapist (Florida), Certified Cyriax Practitioner, and a physiotherapy background with published work in chronic pain and orthopedic rehabilitation.',
            ],
        ];

        foreach ($glanceItems as $item) {
            $about->glanceItems()->create($item);
        }
    }
}
