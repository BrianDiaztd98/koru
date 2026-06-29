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
            'subtitle' => fake()->sentence(8),
            'description' => fake()->paragraph(),
            'philosophy' => fake()->paragraph(),
            'vision' => fake()->paragraph(),
            'feature_1_title' => fake()->sentence(3),
            'feature_1_description' => fake()->paragraph(),
            'feature_2_title' => fake()->sentence(3),
            'feature_2_description' => fake()->paragraph(),
            'image_1' => 'img/about/therapy.jpeg',
            'image_2' => 'img/about/massage.jpeg',
            'image_3' => 'img/about/team.jpeg',
        ];
    }
}
