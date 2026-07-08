<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\DayDiscountSetting;
use App\Models\Package;
use App\Models\Service;
use App\Services\DiscountService;
use Illuminate\Support\Facades\Cache;

$today = new \Carbon\Carbon();
$dayOfWeek = $today->dayOfWeek;

DayDiscountSetting::query()->updateOrCreate([
    'day_of_week' => $dayOfWeek,
], [
    'percentage' => 50,
    'active_status' => true,
]);

Cache::forget(DayDiscountSetting::CACHE_KEY);

$s = new DiscountService();

echo "Today: {$today->toDateString()} (dayOfWeek={$dayOfWeek})\n";
echo "percentageForDay: " . $s->percentageForDay() . "\n";
echo "hasDiscount: " . ($s->hasDiscount() ? 'yes' : 'no') . "\n";

$p = Package::query()->first();
if ($p) {
    // Force-enable for testing
    $p->discount_eligible = true;
    $p->save();
    echo "Package: {$p->id} {$p->name_en} price={$p->price} discount_eligible={$p->discount_eligible}\n";
    echo "Discounted: " . $s->applyToPrice($p->price, (bool)$p->discount_eligible) . "\n";
}

$sv = Service::query()->first();
if ($sv) {
    // Force-enable for testing
    $sv->discount_eligible = true;
    $sv->save();
    echo "Service: {$sv->id} {$sv->name_en} price={$sv->price} discount_eligible={$sv->discount_eligible}\n";
    echo "Discounted: " . $s->applyToPrice($sv->price, (bool)$sv->discount_eligible) . "\n";
}

echo "Active map: " . json_encode($s->activeMap()) . "\n";
