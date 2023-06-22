<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        /** @var App\Model\User */
        $user = auth()->user();

        $posts = $user->posts()->with('media')->get();

        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|string',
            'content' => 'required|min:10',
            'privacy' => 'required|in:public,private',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        /** @var App\Model\User */
        $user = auth()->user();

        $post = $user->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'privacy' => $request->privacy,
        ]);

        foreach ($request->images as $image) {
            $post->addMedia($image)->toMediaCollection('images');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil dibuat!',
        ]);
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
        /** @var App\Model\User */
        $user = auth()->user();

        $post = $user->posts()->findOrFail($id);

        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil dihapus!',
        ]);
    }
}
