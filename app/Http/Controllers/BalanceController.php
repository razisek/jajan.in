<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = $user->page->balance->balance ?? 0;

        return view('dashboard.balance.index', compact('balance'));
    }
}
