<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'member')->count();
        $activeUsers = User::where('role', 'member')->where('status', 'active')->count();

        return view('admin.dashboard', compact('totalUsers', 'activeUsers'));
    }
}
