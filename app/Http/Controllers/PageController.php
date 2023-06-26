<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $page = auth()->user()->page;
        $categories = Category::all();
        $socialLinks = SocialLink::all();
        $medsos = $page->medsos()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'link' => $item->socialLink->link,
                'user' => $item->user,
                'icon' => $item->socialLink->getFirstMediaUrl($item->socialLink->code),
            ];
        });

        $avatar = $page->user->getFirstMediaUrl('avatar');
        $header = $page->getFirstMediaUrl('header');

        if ($request->has('s')) {
            return redirect()->route('page.page.index')->with('success', 'Page saved successfully');
        }

        return view('dashboard.page.index', compact('page', 'categories', 'socialLinks', 'medsos', 'avatar', 'header'));
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'sometimes|required|string|max:50',
            'username' => 'required|string|max:25|unique:users,username,' . auth()->id(),
            'about' => 'required|string|min:10',
            'message' => 'sometimes|required|string|min:10',
            'avatar' => 'sometimes|required|image|mimes:jpg,jpeg,png|max:2048',
            'header' => 'sometimes|required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        /** @var App\Model\User */
        $user = auth()->user();

        DB::transaction(function () use ($request, $user) {
            $user->page->update([
                'category_id' => $request->category_id,
                'about' => $request->about,
                'message' => $request->message,
            ]);

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
            ]);

            if ($request->hasFile('avatar')) {
                if ($user->hasMedia('avatar')) {
                    $user->getFirstMedia('avatar')->delete();
                }
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            if ($request->hasFile('header')) {
                if ($user->page->hasMedia('header')) {
                    $user->page->getFirstMedia('header')->delete();
                }

                $user->page->addMedia($request->header)->toMediaCollection('header');
            }
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Page berhasil diupdate',
        ]);
    }

    public function deleteAvatar()
    {
        /** @var App\Model\User */
        $user = auth()->user();

        if ($user->hasMedia('avatar')) {
            $user->getFirstMedia('avatar')->delete();
        }

        return redirect()->route('page.page.index');
    }

    public function deleteHeader()
    {
        /** @var App\Model\User */
        $user = auth()->user();

        if ($user->page->hasMedia('header')) {
            $user->page->getFirstMedia('header')->delete();
        }

        return redirect()->route('page.page.index');
    }
}
