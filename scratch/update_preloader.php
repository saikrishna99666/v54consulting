<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\DynamicContent;

$setting = DynamicContent::first();
if ($setting) {
    $setting->update(['preloader_image' => 'preloader.png']);
    echo "SUCCESS: Preloader image set in database.\n";
} else {
    echo "ERROR: No settings record found in database.\n";
}
