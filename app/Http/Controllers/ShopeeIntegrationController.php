<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ConnectedStore;

class ShopeeIntegrationController extends Controller
{
    private function getDomain()
    {
        return env('SHOPEE_ENV') === 'live' 
            ? 'https://partner.shopeemobile.com' 
            : 'https://partner.test-stable.shopeemobile.com';
    }

    public function authorizeShopee()
    {
        $partnerId = env('SHOPEE_PARTNER_ID');
        $partnerKey = env('SHOPEE_PARTNER_KEY');
        $timestamp = time();
        $path = '/api/v2/shop/auth_partner';
        $redirectUrl = env('NGROK_URL') . '/stores/shopee/callback';
        
        $sign = hash_hmac('sha256', sprintf('%s%s%s', $partnerId, $path, $timestamp), $partnerKey);

        $url = sprintf(
            "%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s",
            $this->getDomain(),
            $path,
            $partnerId,
            $timestamp,
            $sign,
            urlencode($redirectUrl)
        );

        return redirect($url);
    }

    public function callback(Request $request)
    {
        $code = $request->input('code');
        $shopId = $request->input('shop_id');
        
        if (!$code || !$shopId) {
            return redirect()->route('stores.index')->with('error', 'Otorisasi gagal atau dibatalkan.');
        }

        $partnerId = env('SHOPEE_PARTNER_ID');
        $partnerKey = env('SHOPEE_PARTNER_KEY');
        $timestamp = time();
        $path = '/api/v2/auth/token/get';
        
        $sign = hash_hmac('sha256', sprintf('%s%s%s', $partnerId, $path, $timestamp), $partnerKey);

        $response = Http::post(sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s", $this->getDomain(), $path, $partnerId, $timestamp, $sign), [
            'code' => $code,
            'shop_id' => (int)$shopId,
            'partner_id' => (int)$partnerId,
        ]);

        $data = $response->json();

        if (isset($data['access_token'])) {
            $store = ConnectedStore::updateOrCreate(
                ['platform' => 'shopee', 'shop_id' => $shopId],
                [
                    'access_token' => $data['access_token'],
                    'refresh_token' => $data['refresh_token'],
                    'token_expires_at' => now()->addSeconds($data['expire_in']),
                    'status' => 'active',
                    'user_id' => auth()->id() ?? null,
                ]
            );

            // Set default store name if empty
            if (empty($store->store_name)) {
                $store->store_name = 'Toko Shopee ' . $shopId;
                $store->save();
            }
            return redirect()->route('stores.index')->with('success', 'Toko Shopee berhasil dihubungkan.');
        }

        return redirect()->route('stores.index')->with('error', 'Gagal mendapatkan token: ' . ($data['message'] ?? 'Unknown error'));
    }
}
