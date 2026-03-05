<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'company'   => 'nullable|string|max:150',
            'role'      => 'nullable|string|max:100',
            'message'   => 'required|string|max:2000',
            'rating'    => 'nullable|integer|min:1|max:5',
            'is_active' => 'nullable|boolean',
            'order'     => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'company'   => 'nullable|string|max:150',
            'role'      => 'nullable|string|max:100',
            'message'   => 'required|string|max:2000',
            'rating'    => 'nullable|integer|min:1|max:5',
            'is_active' => 'nullable|boolean',
            'order'     => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }
}
