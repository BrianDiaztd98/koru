<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Service;
use App\Services\AdminMediaService;

// Get all services with images
$services = Service::whereNotNull('image_path')->get();

foreach ($services as $service) {
    echo "Service: {$service->name_en}\n";
    echo "  image_path: {$service->image_path}\n";
    echo '  resolved URL: '.AdminMediaService::resolveImageUrl($service->image_path)."\n";

    $fullPath = storage_path('app/public/'.$service->image_path);
    echo '  file exists: '.(file_exists($fullPath) ? 'YES' : 'NO')."\n";
    if (file_exists($fullPath)) {
        echo '  file size: '.filesize($fullPath)." bytes\n";
        $info = getimagesize($fullPath);
        echo "  dimensions: {$info[0]}x{$info[1]}\n";
        echo "  MIME: {$info['mime']}\n";
    }
    echo "\n";
}
