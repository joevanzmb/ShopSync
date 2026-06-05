<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();
        $connectedStoreIds = \App\Models\ConnectedStore::where('user_id', $userId)->pluck('id');
        
        $activeStoresCount = $connectedStoreIds->count();
        $totalOrders = \App\Models\Order::whereIn('connected_store_id', $connectedStoreIds)->count();
        
        $monthlySales = \App\Models\Order::whereIn('connected_store_id', $connectedStoreIds)
            ->whereMonth('order_date', date('m'))
            ->sum('total_amount');
            
        $monthlySalesFormatted = 'Rp ' . number_format($monthlySales, 0, ',', '.');
        
        $kpis = [
            'active_stores' => $activeStoresCount,
            'urgent_orders' => 0, // Placeholder
            'monthly_sales' => $monthlySalesFormatted,
            'conversion_rate' => '0%',
            'sync_errors' => 0,
            'total_orders' => $totalOrders,
        ];

        $chartData = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'sales' => [0, 0, 0, 0, 0, 0, 0],
            'orders' => [0, 0, 0, 0, 0, 0, 0],
        ];

        $recentOrders = \App\Models\Order::whereIn('connected_store_id', $connectedStoreIds)
            ->with('store')
            ->orderBy('order_date', 'desc')
            ->take(5)
            ->get()
            ->map(function($order) {
                return [
                    'id' => $order->order_number ?? 'ORD-' . $order->id,
                    'platform' => $order->store->platform ?? 'Marketplace',
                    'customer' => $order->customer_name ?? 'Pelanggan',
                    'amount' => 'Rp ' . number_format($order->total_amount, 0, ',', '.'),
                    'status' => $order->status ?? 'Pesanan Baru',
                    'date' => $order->order_date ? $order->order_date->diffForHumans() : 'Baru saja',
                ];
            });

        $platforms = \App\Models\ConnectedStore::where('user_id', $userId)->get()->map(function($store) {
            $icon = 'shopee-icon';
            if (strtolower($store->platform) == 'tokopedia') $icon = 'tokopedia-icon';
            if (strtolower($store->platform) == 'tiktok shop') $icon = 'tiktok-icon';
            return [
                'name' => $store->platform,
                'store_name' => $store->store_name ?? 'Toko',
                'status' => $store->status ?? 'connected',
                'last_sync' => 'Baru saja',
                'icon' => $icon,
            ];
        });

        // Top products would be grouped and ordered by sales volume, but for now we keep it empty for new users
        $topProducts = [];

        $tasks = [];
        if ($activeStoresCount === 0) {
            $tasks[] = ['title' => 'Anda belum menghubungkan toko apapun. Hubungkan Shopee, Tokopedia, atau TikTok Shop sekarang.', 'type' => 'warning'];
        }

        $livePerformance = [
            'sales' => $monthlySalesFormatted,
            'orders' => $totalOrders,
            'visitors' => 0,
            'chart_data' => [
                'labels' => ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00'],
                'data' => [0, 0, 0, 0, 0, 0, 0]
            ]
        ];

        return view('dashboard', compact('kpis', 'chartData', 'recentOrders', 'platforms', 'topProducts', 'tasks', 'livePerformance'));
    }
}
