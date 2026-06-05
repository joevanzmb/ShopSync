<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();
        $products = Product::where('user_id', $userId)->with('variants')->get();
        
        $totalSku = 0;
        $lowStock = 0;
        $outOfStock = 0;
        
        foreach ($products as $product) {
            $totalSku += $product->variants->count();
            foreach ($product->variants as $variant) {
                if ($variant->stock == 0) $outOfStock++;
                elseif ($variant->stock < 10) $lowStock++;
            }
        }
        
        $stats = [
            'total_sku' => $totalSku,
            'low_stock' => $lowStock,
            'out_of_stock' => $outOfStock,
            'unsynced' => 0, // Mock for now
        ];

        return view('products.index', compact('products', 'stats'));
    }
}
