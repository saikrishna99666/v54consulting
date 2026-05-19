<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\DynamicContent;

$setting1 = DynamicContent::find(1);
$setting4 = DynamicContent::find(4);

if ($setting1 && $setting4) {
    if (empty($setting1->google_maps_link)) {
        $setting1->google_maps_link = $setting4->google_maps_link;
        $setting1->save();
        echo "Map link moved to ID 1.\n";
    }
}

// Delete redundant records
$deleted = DynamicContent::where('id', '>', 1)->delete();
echo "Deleted $deleted redundant records.\n";
echo "Final Source of Truth: ID 1\n";
