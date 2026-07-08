<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\DayDiscountSetting;
use App\Services\DiscountService;
use Carbon\Carbon;

$today = Carbon::now();
$day = $today->dayOfWeek;

$setting = DayDiscountSetting::firstOrNew(['day_of_week' => $day]);
$setting->percentage = 50;
$setting->active_status = true;
$setting->save();

// Clear cache explicitly
$svc = new DiscountService(app());
$svc->forgetCache();

echo "Set day_of_week={$day} ({$today->format('l')}) => percentage=50 active=true\n";
echo "Cache cleared.\n";
