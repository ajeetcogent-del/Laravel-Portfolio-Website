<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        $projects      = Project::ordered()->get();
        $testimonials  = Testimonial::active()->get();
        $skills        = Skill::orderBy('category')->orderBy('order')->get()->groupBy('category');
        $services      = Service::active()->get();

        return view('welcome', compact('projects', 'testimonials', 'skills', 'services'));
    }

    public function show(string $slug)
    {
        $project  = Project::where('slug', $slug)->firstOrFail();
        $related  = Project::where('id', '!=', $project->id)->ordered()->take(3)->get();

        return view('portfolio.show', compact('project', 'related'));
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you! Your message has been sent. I will get back to you shortly.');
    }
}
