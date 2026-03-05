<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:200',
            'description'  => 'required|string',
            'problem'      => 'nullable|string',
            'solution'     => 'nullable|string',
            'technologies' => 'nullable|string',
            'github_link'  => 'nullable|url|max:500',
            'demo_link'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|max:2048',
            'features'     => 'nullable|string',
            'results'      => 'nullable|string',
            'featured'     => 'nullable|boolean',
            'order'        => 'nullable|integer',
        ]);

        $validated['slug']     = Str::slug($validated['title']);
        $validated['featured'] = $request->has('featured');
        $validated['features'] = $request->features
            ? array_filter(array_map('trim', explode("\n", $request->features)))
            : null;
        $validated['results']  = $request->results
            ? array_filter(array_map('trim', explode("\n", $request->results)))
            : null;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:200',
            'description'  => 'required|string',
            'problem'      => 'nullable|string',
            'solution'     => 'nullable|string',
            'technologies' => 'nullable|string',
            'github_link'  => 'nullable|url|max:500',
            'demo_link'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|max:2048',
            'features'     => 'nullable|string',
            'results'      => 'nullable|string',
            'featured'     => 'nullable|boolean',
            'order'        => 'nullable|integer',
        ]);

        $validated['slug']     = Str::slug($validated['title']);
        $validated['featured'] = $request->has('featured');
        $validated['features'] = $request->features
            ? array_filter(array_map('trim', explode("\n", $request->features)))
            : null;
        $validated['results']  = $request->results
            ? array_filter(array_map('trim', explode("\n", $request->results)))
            : null;

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
