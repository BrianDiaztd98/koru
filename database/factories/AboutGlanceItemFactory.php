<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutGlanceItem>
 */
class AboutGlanceItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'about_id' => About::factory(),
            'order' => 1,
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
        ];
    }
}
