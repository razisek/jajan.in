<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function supportUser()
    {
        $user = auth()->user();

        $transactions = $user->page->transactions()
            ->where('is_anonymous', 0)
            ->where('payment_status', 'SUCCEEDED')
            ->get();

        return view('dashboard.support.user', compact('transactions'));
    }

    public function supportAnon()
    {
        $user = auth()->user();

        $transactions = $user->page->transactions()
            ->where('is_anonymous', 1)
            ->where('payment_status', 'SUCCEEDED')
            ->get();

        return view('dashboard.support.anon', compact('transactions'));
    }
}
