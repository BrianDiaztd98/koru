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
            'description' => 'Discover the philosophy and technical framework behind our specialized wellness and learning ecosystem.',
            'philosophy' => 'Named after the Māori symbol for a new unfurling fern frond, KORU represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.',
            'vision' => 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.',
            'mission' => 'At KORU, we specialize in clinical massage therapy, advanced recovery technologies, IV infusion services, and professional continuing education. Every service is delivered in a clean, structured environment by certified specialists focused on measurable results and long-term wellness.',
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
                'title' => 'Who we are',
                'description' => 'A wellness, recovery, therapy, and professional education center built around practical support and clinical standards.',
            ],
            [
                'order' => 2,
                'title' => 'What we do',
                'description' => 'Clinical massage, recovery technologies, IV Therapy, Booster Shots, KORU at Home, and continuing education.',
            ],
            [
                'order' => 3,
                'title' => 'Who we serve',
                'description' => 'Individuals seeking relief and wellness, active people focused on recovery, and professionals seeking education.',
            ],
            [
                'order' => 4,
                'title' => 'How we work',
                'description' => 'Attentive service, structured protocols, specialized techniques, and clear communication.',
            ],
            [
                'order' => 5,
                'title' => 'What sets us apart',
                'description' => 'We bring wellness, recovery, clinical care, and education together in one organized environment.',
            ],
            [
                'order' => 6,
                'title' => 'What KORU represents',
                'description' => 'New life, growth, strength, peace, and the possibility of moving forward with purpose.',
            ],
        ];

        foreach ($glanceItems as $item) {
            $about->glanceItems()->create($item);
        }
    }
}
