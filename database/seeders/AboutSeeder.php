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
            'philosophy' => 'Named after the Māori symbol for a new unfurling fern frond, Koru represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.',
            'vision' => 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.',
            'image_1' => 'img/about/therapy.jpeg',
            'image_2' => 'img/about/massage.jpeg',
            'image_3' => 'img/about/team.jpeg',
        ]);
    }
}
