<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\DayDiscountSetting;
use App\Services\DiscountService;
use Carbon\Carbon;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Cache;

$now = Carbon::now();
$dayOfWeek = $now->dayOfWeek;

echo 'now: '.$now->toDateTimeString()."\n";
echo "dayOfWeek: ({$dayOfWeek})\n";

$map = Cache::get(DayDiscountSetting::CACHE_KEY);
echo 'cached map (raw): ';
var_export($map);
echo "\n";

$svc = new DiscountService(app());
$map2 = $svc->activeMap();
echo 'activeMap() return: ';
var_export($map2);
echo "\n";

if (is_array($map2)) {
    echo 'isset(map[dayOfWeek])? ';
    var_export(isset($map2[$dayOfWeek]));
    echo "\n";
    echo 'array_key_exists? ';
    var_export(array_key_exists($dayOfWeek, $map2));
    echo "\n";
    foreach ($map2 as $k => $v) {
        echo 'key type: ('.gettype($k).") => '".$k."' value: $v\n";
    }
}

echo 'percentageForDay(): '.$svc->percentageForDay()."\n";
