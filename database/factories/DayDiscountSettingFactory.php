<?php

namespace Database\Factories;

use App\Models\DayDiscountSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DayDiscountSetting>
 */
class DayDiscountSettingFactory extends Factory
{
    protected $model = DayDiscountSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day_of_week' => fake()->unique()->numberBetween(0, 6),
            'percentage' => fake()->numberBetween(0, 50),
            'active_status' => true,
        ];
    }

    /**
     * Configure the setting for Sunday (day_of_week = 0).
     */
    public function sunday(float $percentage = 50): static
    {
        return $this->state(fn (array $attributes) => [
            'day_of_week' => 0,
            'percentage' => $percentage,
        ]);
    }
}
