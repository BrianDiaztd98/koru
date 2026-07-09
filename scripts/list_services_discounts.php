<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use App\Services\DiscountService;
use Carbon\Carbon;
use Illuminate\Contracts\Console\Kernel;

$svc = new DiscountService(app());
$today = Carbon::now();
$day = $today->dayOfWeek;

echo 'Today: '.$today->toDateString()." (dayOfWeek={$day})\n\n";

$services = Service::query()->where('active_status', true)->orderBy('category')->orderBy('name_en')->get();

foreach ($services as $s) {
    $down = $svc->discountAmount($s->price, (bool) $s->discount_eligible);
    $applies = $down > 0 ? 'YES' : 'NO';
    echo sprintf("%3s | id=%d | %-30s | cat=%-15s | price=%6.2f | eligible=%s | down=%6.2f | applies=%s\n", '', $s->id, $s->name_en, $s->category, $s->price, ($s->discount_eligible ? 'true ' : 'false'), $down, $applies);
}
