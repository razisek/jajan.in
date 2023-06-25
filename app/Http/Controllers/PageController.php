<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index()
    {
        $page = auth()->user()->page;
        $categories = Category::all();
        $socialLinks = SocialLink::all();
        $medsos = $page->medsos()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'link' => $item->socialLink->link,
                'user' => $item->user,
            ];
        });

        return view('dashboard.page.index', compact('page', 'categories', 'socialLinks', 'medsos'));
    }

    public function socialLinks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'social_id' => 'required|exists:social_links,id',
            'user' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $page = auth()->user()->page;

        if ($page->medsos()->where('social_link_id', $request->social_id)->exists()) {
            $page->medsos()->where('social_link_id', $request->social_id)->update([
                'user' => $request->user,
            ]);
        } else {
            $page->medsos()->create([
                'social_link_id' => $request->social_id,
                'user' => $request->user,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Social link added successfully',
        ]);
    }

    public function deleteSocialLink(String $id)
    {
        $medsos = auth()->user()->page->medsos()->findOrFail($id);

        $medsos->delete();

        return redirect()->route('page.page.index');
    }

    public function unit()
    {
        return view('dashboard.page.unit');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
