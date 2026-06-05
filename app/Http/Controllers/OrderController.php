<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $userId = \Illuminate\Support\Facades\Auth::id();
        $storeIds = \App\Models\ConnectedStore::where('user_id', $userId)->pluck('id');

        $query = Order::with(['items', 'customer', 'store'])
                      ->whereIn('connected_store_id', $storeIds);

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $orders = $query->latest('order_date')->get();

        $counts = [
            'all' => Order::whereIn('connected_store_id', $storeIds)->count(),
            'to_process' => Order::whereIn('connected_store_id', $storeIds)->where('status', 'to_process')->count(),
            'to_ship' => Order::whereIn('connected_store_id', $storeIds)->where('status', 'to_ship')->count(),
            'shipping' => Order::whereIn('connected_store_id', $storeIds)->where('status', 'shipping')->count(),
            'completed' => Order::whereIn('connected_store_id', $storeIds)->where('status', 'completed')->count(),
            'returns' => Order::whereIn('connected_store_id', $storeIds)->where('status', 'returns')->count(),
        ];

        $labels = [
            'all'        => ['Semua Pesanan',   'Daftar lengkap seluruh pesanan dari semua marketplace.'],
            'to_process' => ['Perlu Diproses',  'Pesanan baru yang perlu segera diproses dan dikemas.'],
            'to_ship'    => ['Perlu Dikirim',   'Pesanan yang sudah dikemas dan siap di-pickup atau dikirim.'],
            'shipping'   => ['Sedang Dikirim',  'Pesanan yang sedang dalam proses pengiriman oleh kurir.'],
            'completed'  => ['Selesai',         'Pesanan yang sudah diterima pembeli dengan sukses.'],
            'returns'    => ['Retur',           'Pengajuan pengembalian barang atau dana dari pelanggan.'],
        ];

        [$title, $desc] = $labels[$status] ?? $labels['all'];

        return view('orders.index', compact('orders', 'title', 'desc', 'counts') + ['currentStatus' => $status]);
    }
}
