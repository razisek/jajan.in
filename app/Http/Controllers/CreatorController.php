<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function index(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $page = $user->page;
        $medsos = $page->medsos()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'link' => $item->socialLink->link,
                'user' => $item->user,
                'icon' => $item->socialLink->getFirstMediaUrl($item->socialLink->code),
                'name' => $item->socialLink->name
            ];
        });

        $avatar = $page->user->getFirstMediaUrl('avatar');
        $header = $page->getFirstMediaUrl('header');

        $unit = $page->unit()->first();

        $transactions = $page->transactions()
            ->where('payment_status', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('creator', compact('page', 'medsos', 'avatar', 'header', 'unit', 'transactions'));
    }
}
