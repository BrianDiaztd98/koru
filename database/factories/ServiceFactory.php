<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(),
            'name_en' => fake()->words(3, true),
            'name_es' => fake()->words(3, true),
            'description_en' => fake()->sentence(),
            'description_es' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 50, 300),
            'duration' => fake()->randomElement(['30 min', '45 min', '60 min', '90 min']),
            'image_path' => 'img/services/default.jpg',
            'category' => fake()->randomElement(array_keys(Service::categories())),
            'active_status' => true,
        ];
    }
}
