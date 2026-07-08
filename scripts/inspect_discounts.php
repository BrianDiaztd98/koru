<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\DayDiscountSetting;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

echo "=== DayDiscountSetting rows (DB) ===\n";
$rows = DayDiscountSetting::all()->map(function($s){
    return [
        'day' => $s->day_of_week,
        'percentage' => (float)$s->percentage,
        'active' => (bool)$s->active_status,
    ];
})->toArray();
echo json_encode($rows, JSON_PRETTY_PRINT) . "\n\n";

echo "=== Cached map ===\n";
$map = Cache::get(DayDiscountSetting::CACHE_KEY);
echo json_encode($map, JSON_PRETTY_PRINT) . "\n\n";

echo "=== DiscountService computed ===\n";
$s = new App\Services\DiscountService(app());
echo "percentageForDay(): " . $s->percentageForDay() . "\n";
echo "hasDiscount(): " . ($s->hasDiscount() ? 'true' : 'false') . "\n\n";

echo "=== Sample product eligibilities ===\n";
$p = Package::query()->first();
if ($p) {
    echo "Package id={$p->id} price={$p->price} discount_eligible=" . ($p->discount_eligible ? 'true' : 'false') . "\n";
} else {
    echo "No packages found\n";
}

$sv = Service::query()->first();
if ($sv) {
    echo "Service id={$sv->id} price={$sv->price} discount_eligible=" . ($sv->discount_eligible ? 'true' : 'false') . "\n";
} else {
    echo "No services found\n";
}

// Provide manual cache forget hint
echo "\nIf the cached map is stale, run: php artisan tinker -e \"Cache::forget('".DayDiscountSetting::CACHE_KEY."')\" or php artisan cache:clear\n";
