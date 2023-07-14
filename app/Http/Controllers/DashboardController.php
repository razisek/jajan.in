<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = $user->page->balance->balance ?? 0;
        $transactions = $user->page->transactions->where('payment_status', 'paid')->count();
        $posts = $user->posts->count();
        $unit = $user->page->unit;

        return view('dashboard.dashboard', compact('balance', 'transactions', 'posts', 'unit'));
    }
}
