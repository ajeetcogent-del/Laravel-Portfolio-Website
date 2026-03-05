<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:191',
            'slug'     => 'required|string|max:191|unique:blogs,slug',
            'content'  => 'required|string',
            'excerpt'  => 'required|string|max:255',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'tags'     => 'required|string',
        ]);

        $data['tags'] = array_map(
            'trim',
            explode(',', $data['tags'])
        );

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $data['image'] = $path;
        }

        $data['user_id'] = auth()->user()->id;

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:191',
            'slug' => 'required|string|max:191|unique:blogs,slug',
            'content' => 'required|string',
            'excerpt' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'tags' => 'required|string',
        ]);

        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->excerpt = $data['excerpt'];
        $blog->image = $data['image'];
        $blog->category = $data['category'];
        $blog->tags = $data['tags'];
        $blog->save();

        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index');
    }
}
