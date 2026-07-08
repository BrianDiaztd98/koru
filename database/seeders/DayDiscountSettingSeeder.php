<?php

namespace Database\Seeders;

use App\Models\DayDiscountSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayDiscountSettingSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the day-based discount configuration.
     *
     * By default Sundays apply a 50% discount to all priced items,
     * in line with the mandatory 50% advance payment policy for Sunday bookings.
     */
    public function run(): void
    {
        DayDiscountSetting::query()->updateOrCreate(
            ['day_of_week' => 0],
            [
                'percentage' => 50,
                'active_status' => true,
            ]
        );
    }
}
