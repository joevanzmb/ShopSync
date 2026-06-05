<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$store = \App\Models\ConnectedStore::first();
if (!$store) {
    echo "No store found.\n";
    exit;
}

$service = new \App\Services\StoreSyncService();

$reflection = new ReflectionClass($service);
$buildUrl = $reflection->getMethod('buildUrl');
$buildUrl->setAccessible(true);

$urlShopInfo = $buildUrl->invoke($service, '/api/v2/shop/get_shop_info', $store, []);
echo "Testing Shop Info URL...\n";
$resShopInfo = \Illuminate\Support\Facades\Http::get($urlShopInfo);
echo json_encode($resShopInfo->json(), JSON_PRETTY_PRINT) . "\n\n";

$urlItemList = $buildUrl->invoke($service, '/api/v2/product/get_item_list', $store, [
    'offset' => 0,
    'page_size' => 50,
    'item_status' => 'NORMAL'
]);
echo "Testing Item List URL...\n";
$resItemList = \Illuminate\Support\Facades\Http::get($urlItemList);
echo json_encode($resItemList->json(), JSON_PRETTY_PRINT) . "\n\n";
