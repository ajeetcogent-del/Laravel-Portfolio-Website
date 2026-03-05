@extends('layouts.portfolio')

@section('title', $project->title . ' | Case Study – Ajeet Chaubey')
@section('meta_description', Str::limit($project->description, 160))

@section('content')

{{-- ─── Case Study Hero ─── --}}
<div class="case-study-hero">
    <div class="container">
        <a href="{{ route('home') }}#projects" class="case-back">
            <i class="fas fa-arrow-left"></i> Back to Projects
        </a>

        @if($project->featured)
        <div style="margin-bottom:12px">
            <span class="badge-tech" style="color:var(--warning);border-color:rgba(255,201,77,.3);background:rgba(255,201,77,.08)">
                <i class="fas fa-star"></i> Featured Project
            </span>
        </div>
        @endif

        <h1>{{ $project->title }}</h1>

        <div class="case-meta">
            @if($project->technologies)
            <span class="case-meta-item"><i class="fas fa-code"></i> {{ $project->technologies }}</span>
            @endif
            <span class="case-meta-item"><i class="fas fa-calendar-alt"></i> {{ $project->created_at->format('M Y') }}</span>
        </div>

        <div class="case-actions">
            @if($project->demo_link)
            <a href="{{ $project->demo_link }}" target="_blank" rel="noopener" class="btn-primary" id="liveDemoBtn">
                <i class="fas fa-external-link-alt"></i> Live Demo
            </a>
            @endif
            @if($project->github_link)
            <a href="{{ $project->github_link }}" target="_blank" rel="noopener" class="btn-outline" id="githubRepoBtn">
                <i class="fab fa-github"></i> View on GitHub
            </a>
            @endif
            <a href="{{ route('home') }}#contact" class="btn-outline" id="hireForProjectBtn">
                <i class="fas fa-paper-plane"></i> Hire Me
            </a>
        </div>
    </div>
</div>

{{-- ─── Case Study Content ─── --}}
<div class="case-content">
    <div class="container">
        <div class="case-grid">

            {{-- Main Content Column --}}
            <div class="case-main">

                {{-- Project Image --}}
                @if($project->image)
                <div style="margin-bottom:48px;border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden" class="reveal">
                    <img src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        style="width:100%;display:block">
                </div>
                @endif

                {{-- Overview --}}
                <div class="case-section reveal">
                    <h2><i class="fas fa-info-circle"></i> Project Overview</h2>
                    <p>{{ $project->description }}</p>
                </div>

                {{-- Problem --}}
                @if($project->problem)
                <div class="case-section reveal">
                    <h2><i class="fas fa-exclamation-triangle"></i> The Problem</h2>
                    <p>{{ $project->problem }}</p>
                </div>
                @endif

                {{-- Solution --}}
                @if($project->solution)
                <div class="case-section reveal">
                    <h2><i class="fas fa-lightbulb"></i> The Solution</h2>
                    <p>{{ $project->solution }}</p>
                </div>
                @endif

                {{-- Key Features --}}
                @if($project->features && count($project->features))
                <div class="case-section reveal">
                    <h2><i class="fas fa-check-double"></i> Key Features</h2>
                    <div class="case-features">
                        @foreach($project->features as $feature)
                        @if(!empty($feature))
                        <div class="case-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ $feature }}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Results --}}
                @if($project->results && count($project->results))
                <div class="case-section reveal">
                    <h2><i class="fas fa-chart-line"></i> Results & Impact</h2>
                    <div class="case-features">
                        @foreach($project->results as $result)
                        @if(!empty($result))
                        <div class="case-feature" style="border-color:rgba(0,212,170,.2);background:rgba(0,212,170,.05)">
                            <i class="fas fa-arrow-trend-up" style="color:var(--accent2)"></i>
                            <span>{{ $result }}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Screenshots --}}
                @if($project->screenshots && count($project->screenshots))
                <div class="case-section reveal">
                    <h2><i class="fas fa-images"></i> Screenshots</h2>
                    <div class="screenshots-grid">
                        @foreach($project->screenshots as $screenshot)
                        <div class="screenshot-img">
                            <img src="{{ asset('storage/' . $screenshot) }}" alt="Project Screenshot" loading="lazy">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- Sidebar --}}
            <aside class="case-sidebar reveal reveal-delay-2">

                {{-- Tech Stack --}}
                @if($project->technologies)
                <div class="case-info-card">
                    <h4><i class="fas fa-laptop-code" style="margin-right:6px;color:var(--accent)"></i>Technologies</h4>
                    <div class="case-tech-badges">
                        @foreach($project->technologies_array as $tech)
                        @if(!empty(trim($tech)))
                        <span class="badge-tech">{{ trim($tech) }}</span>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Links --}}
                @if($project->demo_link || $project->github_link)
                <div class="case-info-card">
                    <h4><i class="fas fa-link" style="margin-right:6px;color:var(--accent)"></i>Links</h4>
                    <div class="case-info-row">
                        @if($project->demo_link)
                        <a href="{{ $project->demo_link }}" target="_blank" rel="noopener"
                            class="contact-channel" style="text-decoration:none">
                            <div class="contact-channel-icon"><i class="fas fa-globe"></i></div>
                            <div>
                                <span class="contact-channel-label">Live Demo</span>
                                <span class="contact-channel-val" style="font-size:.8rem">View Project</span>
                            </div>
                        </a>
                        @endif
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" rel="noopener"
                            class="contact-channel" style="text-decoration:none">
                            <div class="contact-channel-icon"><i class="fab fa-github"></i></div>
                            <div>
                                <span class="contact-channel-label">Source Code</span>
                                <span class="contact-channel-val" style="font-size:.8rem">GitHub Repo</span>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
                @endif

                {{-- Hire Me CTA --}}
                <div class="case-info-card" style="text-align:center;background:var(--accent-glow);border-color:rgba(108,99,255,.3)">
                    <p style="font-size:.9rem;color:var(--text-secondary);margin-bottom:16px">
                        Interested in a similar project? Let's discuss your requirements.
                    </p>
                    <a href="{{ route('home') }}#contact" class="btn-primary" style="width:100%;justify-content:center">
                        <i class="fas fa-paper-plane"></i> Get In Touch
                    </a>
                </div>

            </aside>
        </div>

        {{-- Related Projects --}}
        @if($related->count())
        <div style="margin-top:80px" class="reveal">
            <div class="section-header" style="text-align:left;margin-bottom:32px">
                <h2 style="font-size:1.6rem">More Projects</h2>
            </div>
            <div class="projects-grid">
                @foreach($related as $rel)
                <article class="project-card">
                    <div class="project-img">
                        @if($rel->image)
                        <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->title }}" loading="lazy">
                        @else
                        <div class="project-img-placeholder"><i class="fas fa-code"></i></div>
                        @endif
                    </div>
                    <div class="project-body">
                        <h3>{{ $rel->title }}</h3>
                        <p>{{ Str::limit($rel->description, 90) }}</p>
                        <div class="project-tags">
                            @foreach($rel->technologies_array as $tech)
                            @if(!empty(trim($tech)))
                            <span class="project-tag">{{ trim($tech) }}</span>
                            @endif
                            @endforeach
                        </div>
                        <div class="project-actions">
                            <a href="{{ route('project.show', $rel->slug) }}" class="primary">
                                <i class="fas fa-book-open"></i> Case Study
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@endsection