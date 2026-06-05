<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LandingController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('store.register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/packages', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('packages.index');
});

// Member Dashboard Routes
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Pesanan
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    
    // Produk
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/promotion', function() {
        return view('products.promotion', [
            'title'       => 'Promosi & Iklan',
            'description' => 'Kelola kampanye diskon, flash sale lintas-marketplace, dan iklan berbayar (Shopee Ads, Tokopedia Ads) dari satu panel terpusat.',
            'promotions'  => [],
            'stats'       => ['active' => 0, 'scheduled' => 0, 'ended' => 0, 'roi' => 0]
        ]);
    })->name('products.promotion');
    
    // Keuangan
    Route::get('/finance', [\App\Http\Controllers\FinanceController::class, 'index'])->name('finance.index');
    Route::get('/finance/cogs', [\App\Http\Controllers\FinanceController::class, 'cogs'])->name('finance.cogs');
    
    // Analitik
    Route::get('/analytics/sales', function() {
        return view('analytics.sales', [
            'stats' => ['revenue' => 0, 'orders' => 0, 'avg_orders' => 0, 'conversion' => 0],
            'products' => [],
            'platforms' => [],
            'heatmap' => [],
            'categories' => []
        ]);
    })->name('analytics.sales');

    Route::get('/analytics/courier', function() {
        return view('analytics.courier', [
            'stats' => ['total_packages' => 0, 'delivered' => 0, 'problematic' => 0, 'avg_time' => 0],
            'couriers' => [],
            'problems' => []
        ]);
    })->name('analytics.courier');
    
    // CRM — Pelanggan
    Route::get('/crm', function() {
        $userId = \Illuminate\Support\Facades\Auth::id();
        $customers = \App\Models\Customer::where('user_id', $userId)->withCount('orders')->get();
        return view('crm.index', compact('customers'));
    })->name('crm.index');
    
    // Integrasi Toko
    Route::get('/stores', function() {
        $userId = \Illuminate\Support\Facades\Auth::id();
        // Eager load productMarketplaces to get the count
        $connectedStores = \App\Models\ConnectedStore::where('user_id', $userId)->get();
        return view('stores.index', compact('connectedStores'));
    })->name('stores.index');
    Route::get('/stores/connect', fn() => view('stores.connect'))->name('stores.connect');
    Route::get('/stores/authorize/{platform}', fn($platform) => view('stores.authorize', compact('platform')))->name('stores.authorize');
    Route::match(['get', 'post'], '/stores/{store}/sync', [\App\Http\Controllers\StoreSyncController::class, 'sync'])->name('stores.sync');
    
    // Shopee OAuth
    Route::get('/stores/shopee/authorize', [\App\Http\Controllers\ShopeeIntegrationController::class, 'authorizeShopee'])->name('stores.shopee.authorize');
    Route::get('/stores/shopee/callback', [\App\Http\Controllers\ShopeeIntegrationController::class, 'callback'])->name('stores.shopee.callback');
    
    // Pengaturan
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
});
