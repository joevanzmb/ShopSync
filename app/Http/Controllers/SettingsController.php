<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $user = [
            'name' => 'Juragan Shopee',
            'email' => 'admin@juraganshopee.id',
            'phone' => '+62 812-3456-7890',
            'plan' => 'Premium'
        ];

        return view('settings.index', compact('user'));
    }
}
