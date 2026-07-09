<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use App\Services\DiscountService;
use Illuminate\Contracts\Console\Kernel;

$id = $argv[1] ?? 3;
$s = Service::find($id);
if (! $s) {
    echo "Service id={$id} not found\n";
    exit(1);
}

$svc = new DiscountService(app());

echo "Service id={$s->id} name={$s->name_en}\n";
var_export(['price_raw' => $s->price, 'type' => gettype($s->price)]);
echo "\n";

$percentage = $svc->percentageForDay();
$down1 = $svc->discountAmount($s->price);
$down2 = $svc->discountAmount($s->price, true);
$down3 = $svc->discountAmount($s->price, false);

echo "percentageForDay: {$percentage}\n";
echo "discountAmount(price): {$down1}\n";
echo "discountAmount(price, true): {$down2}\n";
echo "discountAmount(price, false): {$down3}\n";

// show applyToPrice too
$applied = $svc->applyToPrice($s->price, true);
echo "applyToPrice(price, true) => {$applied}\n";
