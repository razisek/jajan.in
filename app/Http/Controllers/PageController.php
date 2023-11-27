<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\SocialLink;
use App\Models\Unit;
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
                'name' => $item->socialLink->name,
                'user' => $item->user,
                'icon' => $item->socialLink->icon,
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

    public function unit()
    {
        // page unit
        $pageUnits = auth()->user()->page->units;
        $pageUnits = $pageUnits->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'icon' => $item->getFirstMediaUrl('unit'),
            ];
        });
        $pageUnits = collect($pageUnits);

        // all unit
        $units = Unit::whereNull('page_id')->get();
        $units = $units->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'icon' => $item->getFirstMediaUrl('unit'),
            ];
        });

        $empty = 5 - $pageUnits->count();
        return view('dashboard.page.unit', compact('units', 'pageUnits', 'empty'));
    }

    public function storeUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:15',
            'price' => 'required|numeric|min:1000|max:500000',
            'icon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
            $unit = $user->page->units()->create([
                'page_id' => $user->page->id,
                'name' => $request->name,
                'price' => $request->price,
            ]);

            $unit->addMedia($request->icon)->toMediaCollection('unit');
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Unit berhasil ditambahkan',
        ]);
    }

    public function updateUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required|exists:units,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        /** @var App\Model\User */
        $user = auth()->user();

        $checkUnit = $user->page->units()->find($request->unit_id);
        $units = Unit::whereNull('page_id')->get()->find($request->unit_id);

        if (is_null($checkUnit) && is_null($units)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unit tidak dimiliki oleh page anda',
            ], 400);
        }

        $user->page()->update([
            'unit_id' => $request->unit_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Unit berhasil diupdate',
        ]);
    }

    public function deleteUnit(String $id)
    {
        /** @var App\Model\User */
        $user = auth()->user();

        $unit = $user->page->units()->findOrFail($id);

        if ($user->page->unit_id == $id) {
            return redirect()->route('page.unit.index')->with('error', 'Unit tidak dapat dihapus karena sedang digunakan');
        }

        $unit->delete();

        return redirect()->route('page.unit.index');
    }
}
