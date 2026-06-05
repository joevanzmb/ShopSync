<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = [
            [
                'id' => 1,
                'name' => 'Toko A',
                'status' => 'connected',
                'last_sync' => '2026-05-24 10:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Toko B',
                'status' => 'expired',
                'last_sync' => '2026-05-20 09:30:00',
            ],
            [
                'id' => 3,
                'name' => 'Toko C',
                'status' => 'connected',
                'last_sync' => '2026-05-24 14:00:00',
            ],
        ];

        return view('stores.index', compact('stores'));
    }
}
