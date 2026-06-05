<?php

namespace App\Services;

use App\Models\ConnectedStore;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductMarketplace;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StoreSyncService
{
    private function getDomain()
    {
        return env('SHOPEE_ENV') === 'live' 
            ? 'https://partner.shopeemobile.com' 
            : 'https://partner.test-stable.shopeemobile.com';
    }

    private function buildUrl($path, $store, array $additionalParams = [])
    {
        $partnerId = env('SHOPEE_PARTNER_ID');
        $partnerKey = env('SHOPEE_PARTNER_KEY');
        $timestamp = time();
        $accessToken = $store->access_token;
        $shopId = $store->shop_id;

        $signStr = sprintf('%s%s%s%s%s', $partnerId, $path, $timestamp, $accessToken, $shopId);
        $sign = hash_hmac('sha256', $signStr, $partnerKey);

        $params = array_merge([
            'partner_id' => $partnerId,
            'timestamp' => $timestamp,
            'access_token' => $accessToken,
            'shop_id' => $shopId,
            'sign' => $sign,
        ], $additionalParams);

        return sprintf("%s%s?%s", $this->getDomain(), $path, http_build_query($params));
    }

    public function syncWithShopee(ConnectedStore $store)
    {
        try {
            $this->syncShopInfo($store);
            $this->syncProducts($store);
            $this->syncOrders($store);

            $store->updated_at = now();
            $store->save();
        } catch (\Exception $e) {
            Log::error("Shopee Sync Error: " . $e->getMessage());
            throw $e;
        }
    }

    private function syncShopInfo(ConnectedStore $store)
    {
        $url = $this->buildUrl('/api/v2/shop/get_shop_info', $store);
        $response = Http::get($url);
        $data = $response->json();

        if (isset($data['shop_name'])) {
            $store->store_name = $data['shop_name'];
            $store->save();
        } elseif (isset($data['response']['shop_name'])) {
            $store->store_name = $data['response']['shop_name'];
            $store->save();
        }
    }

    private function syncProducts(ConnectedStore $store)
    {
        // 1. Get Item List
        $url = $this->buildUrl('/api/v2/product/get_item_list', $store, [
            'offset' => 0,
            'page_size' => 50,
            'item_status' => 'NORMAL'
        ]);
        
        $response = Http::get($url);
        $data = $response->json();

        if (!isset($data['response']['item'])) return;

        $items = $data['response']['item'];
        if (empty($items)) return;

        $itemIds = array_column($items, 'item_id');

        // 2. Get Item Base Info
        foreach (array_chunk($itemIds, 20) as $chunk) {
            $infoUrl = $this->buildUrl('/api/v2/product/get_item_base_info', $store, [
                'item_id_list' => implode(',', $chunk)
            ]);
            
            $infoResponse = Http::get($infoUrl);
            $infoData = $infoResponse->json();

            if (isset($infoData['response']['item_list'])) {
                foreach ($infoData['response']['item_list'] as $item) {
                    $this->saveProduct($store, $item);
                }
            }
        }
    }

    private function saveProduct(ConnectedStore $store, array $item)
    {
        $imageUrl = null;
        if (isset($item['image']['image_url_list'][0])) {
            $imageId = $item['image']['image_url_list'][0];
            $imageUrl = strpos($imageId, 'http') === 0 ? $imageId : 'https://cf.shopee.co.id/file/' . $imageId;
        }

        $product = Product::firstOrCreate(
            ['user_id' => $store->user_id, 'name' => $item['item_name']],
            [
                'description' => $item['description'] ?? '',
                'image_url' => $imageUrl,
                'status' => true,
            ]
        );

        $price = isset($item['price_info'][0]['original_price']) ? $item['price_info'][0]['original_price'] : 0;
        
        $variant = ProductVariant::firstOrCreate(
            ['product_id' => $product->id, 'sku' => empty($item['item_sku']) ? 'SKU-'.$item['item_id'] : $item['item_sku']],
            [
                'name' => 'Default',
                'price' => $price,
                'cogs' => $price * 0.7, // Asumsi
                'stock' => 10, // Stock API requires separate call
                'image_url' => $product->image_url,
            ]
        );

        ProductMarketplace::updateOrCreate(
            ['product_variant_id' => $variant->id, 'connected_store_id' => $store->id, 'marketplace_product_id' => $item['item_id']],
            [
                'sync_status' => 'synced',
            ]
        );
    }

    private function syncOrders(ConnectedStore $store)
    {
        $timeTo = time();
        $timeFrom = strtotime('-15 days'); // Limit to last 15 days

        $url = $this->buildUrl('/api/v2/order/get_order_list', $store, [
            'time_range_field' => 'create_time',
            'time_from' => $timeFrom,
            'time_to' => $timeTo,
            'page_size' => 50,
        ]);

        $response = Http::get($url);
        $data = $response->json();

        if (!isset($data['response']['order_list'])) return;

        $orders = $data['response']['order_list'];
        if (empty($orders)) return;

        $orderSns = array_column($orders, 'order_sn');

        // Get Order Details
        foreach (array_chunk($orderSns, 20) as $chunk) {
            $detailUrl = $this->buildUrl('/api/v2/order/get_order_detail', $store, [
                'order_sn_list' => implode(',', $chunk),
                'response_optional_fields' => 'buyer_user_id,buyer_username,total_amount,item_list,shipping_carrier,tracking_no'
            ]);

            $detailResponse = Http::get($detailUrl);
            $detailData = $detailResponse->json();

            if (isset($detailData['response']['order_list'])) {
                foreach ($detailData['response']['order_list'] as $orderDetail) {
                    $this->saveOrder($store, $orderDetail);
                }
            }
        }
    }

    private function saveOrder(ConnectedStore $store, array $orderData)
    {
        // 1. Create/Find Customer
        $customer = Customer::firstOrCreate(
            ['user_id' => $store->user_id, 'name' => $orderData['buyer_username'] ?? 'Shopee Buyer'],
            [
                'phone' => '0000',
                'city' => 'Unknown',
                'province' => 'Unknown'
            ]
        );

        // 2. Create/Find Order
        $order = Order::firstOrCreate(
            ['connected_store_id' => $store->id, 'order_number' => $orderData['order_sn']],
            [
                'customer_id' => $customer->id,
                'order_date' => date('Y-m-d H:i:s', $orderData['create_time']),
                'customer_name' => $customer->name,
                'customer_location' => $customer->city,
                'courier_name' => $orderData['shipping_carrier'] ?? 'Shopee Courier',
                'tracking_number' => $orderData['tracking_no'] ?? null,
                'total_amount' => $orderData['total_amount'] ?? 0,
                'payment_method' => 'Shopee',
                'status' => $orderData['order_status'] ?? 'UNKNOWN',
                'sub_status' => $orderData['order_status'] ?? 'UNKNOWN',
            ]
        );

        // 3. Create Order Items
        if (isset($orderData['item_list'])) {
            foreach ($orderData['item_list'] as $item) {
                // Try to map to existing variant if exists
                $marketplace = ProductMarketplace::where('marketplace_product_id', $item['item_id'])->first();
                $variantId = $marketplace ? $marketplace->product_variant_id : null;

                OrderItem::firstOrCreate(
                    ['order_id' => $order->id, 'sku' => $item['model_sku'] ?? 'NO-SKU'],
                    [
                        'product_variant_id' => $variantId,
                        'marketplace_product_name' => $item['item_name'],
                        'quantity' => $item['model_quantity_purchased'],
                        'price' => $item['model_discounted_price'],
                    ]
                );
            }
        }
    }
}
