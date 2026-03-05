<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post  = Post::get();
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:106',
            'description' => 'required|string',
            'state_id'  => 'required|integer'
        ]);

        $create = Post::create($data);
        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        if (request()->ajax()) {
            return response()->json([
                'post' => $post,
            ]);
        }
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:106',
            'description' => 'required|string',
            'state_id'  => 'required|integer'
        ]);

        $post->update($data);
        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }
}
