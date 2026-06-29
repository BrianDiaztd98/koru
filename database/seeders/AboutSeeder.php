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

        About::query()->create([
            'title' => 'About KORU',
            'subtitle' => 'Bridging the gap between recovery, movement, and education',
            'description' => 'Discover the philosophy and technical framework behind our specialized wellness and learning ecosystem.',
            'philosophy' => 'Named after the Māori symbol for a new unfurling fern frond, Koru represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.',
            'vision' => 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.',
            'feature_1_title' => 'Wellness & Therapy',
            'feature_1_description' => 'Tailored operational architectures built for fluid content management and clean UI stability.',
            'feature_2_title' => 'Advanced Education',
            'feature_2_description' => 'Empowering specialists through interactive workshops and fully scalable learning data tracks.',
            'image_1' => 'img/about/therapy.jpeg',
            'image_2' => 'img/about/massage.jpeg',
            'image_3' => 'img/about/team.jpeg',
        ]);
    }
}
