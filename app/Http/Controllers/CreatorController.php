<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
            ->where('payment_status', 'SUCCEEDED')
            ->orderBy('created_at', 'desc')
            ->get();

        $posts = $user->posts()->orderBy('created_at', 'desc')->with('media')->get();

        return view('creator', compact('page', 'medsos', 'avatar', 'header', 'unit', 'transactions', 'posts'));
    }

    public function post(string $username)
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

        $posts = $user->posts()
            ->where('status', 'public')
            ->orderBy('created_at', 'desc')
            ->with('media')
            ->get();

        return view('creator-post', compact('page', 'medsos', 'avatar', 'header', 'unit', 'posts'));
    }

    public function explore(Request $request)
    {
        $pages = Page::whereHas('user', function (Builder $query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->get();

        return view('explore', compact('pages'));
    }
}
