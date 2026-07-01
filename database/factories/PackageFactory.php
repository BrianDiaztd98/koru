<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(2),
            'name_en' => fake()->words(2, true),
            'name_es' => fake()->words(2, true),
            'description_en' => fake()->paragraph(),
            'description_es' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 50, 2000),
            'sessions' => fake()->numberBetween(1, 20),
            'validity' => fake()->optional()->randomElement(['Valid for 4 weeks', 'Valid for 8 weeks', 'Valid for 12 weeks', 'Valid for 25 weeks']),
            'sort_order' => 0,
            'active_status' => true,
        ];
    }
}
