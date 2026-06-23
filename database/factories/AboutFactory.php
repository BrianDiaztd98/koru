<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<About>
 */
class AboutFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'philosophy' => fake()->paragraph(),
            'vision' => fake()->paragraph(),
            'image_1' => 'img/about/therapy.jpeg',
            'image_2' => 'img/about/massage.jpeg',
            'image_3' => 'img/about/team.jpeg',
        ];
    }
}
