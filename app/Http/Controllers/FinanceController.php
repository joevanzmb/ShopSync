<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;

class FinanceController extends Controller
{
    public function index()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();
        
        $finance = [
            'total_income' => 0,
            'total_expense' => 0,
            'net_profit' => 0,
            'transactions' => []
        ];

        return view('finance.index', compact('finance'));
    }

    public function cogs()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();
        $variants = ProductVariant::whereHas('product', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })->with('product')->get();
        
        return view('finance.cogs', compact('variants'));
    }
}
