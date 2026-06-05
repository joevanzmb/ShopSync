<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$store = \App\Models\ConnectedStore::first();
$service = new \App\Services\StoreSyncService();
$reflection = new ReflectionClass($service);
$buildUrl = $reflection->getMethod('buildUrl');
$buildUrl->setAccessible(true);

$urlItemInfo = $buildUrl->invoke($service, '/api/v2/product/get_item_base_info', $store, [
    'item_id_list' => '40562306771'
]);
echo "Testing Item Base Info URL...\n";
$resItemInfo = \Illuminate\Support\Facades\Http::get($urlItemInfo);
echo json_encode($resItemInfo->json(), JSON_PRETTY_PRINT) . "\n\n";

$timeTo = time();
$timeFrom = strtotime('-15 days');
$urlOrderList = $buildUrl->invoke($service, '/api/v2/order/get_order_list', $store, [
    'time_range_field' => 'create_time',
    'time_from' => $timeFrom,
    'time_to' => $timeTo,
    'page_size' => 50,
]);
echo "Testing Order List URL...\n";
$resOrderList = \Illuminate\Support\Facades\Http::get($urlOrderList);
echo json_encode($resOrderList->json(), JSON_PRETTY_PRINT) . "\n\n";
