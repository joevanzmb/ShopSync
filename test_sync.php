<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$service = app(App\Services\StoreSyncService::class);
$store = \App\Models\ConnectedStore::first();
if ($store) {
    $service->syncWithShopee($store);
    echo "Sync ran successfully.\n";
} else {
    echo "No store found.\n";
}
