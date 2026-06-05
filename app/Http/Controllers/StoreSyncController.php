<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConnectedStore;
use App\Services\StoreSyncService;

class StoreSyncController extends Controller
{
    protected $syncService;

    public function __construct(StoreSyncService $syncService)
    {
        $this->syncService = $syncService;
    }

    public function sync(ConnectedStore $store)
    {
        // Ensure user owns this store
        if ($store->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Run the real sync service
            $this->syncService->syncWithShopee($store);

            return redirect()->back()->with('success', 'Sinkronisasi berhasil! Data toko, produk, dan pesanan telah diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyinkronkan data dengan Shopee API: ' . $e->getMessage());
        }
    }
}
