<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\DayDiscountSetting;
use App\Services\DiscountService;

$dayArg = $argv[1] ?? null;
if ($dayArg === null) {
    echo "Usage: php apply_day_abono.php <dayNumber0-6>\n";
    exit(1);
}

$day = (int) $dayArg;
if ($day < 0 || $day > 6) {
    echo "Invalid day number. Use 0=Sunday .. 6=Saturday\n";
    exit(1);
}

$setting = DayDiscountSetting::firstOrNew(['day_of_week' => $day]);
$setting->percentage = 50;
$setting->active_status = true;
$setting->save();

$svc = new DiscountService(app());
$svc->forgetCache();

echo "Set day_of_week={$day} => percentage=50 active=true and cleared cache\n";
