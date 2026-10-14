@extends('layouts.portfolio')

@section('title', 'Ajeet Chaubey | Websites, Local SEO & Automation')
@section('meta_description', 'Ajeet Chaubey helps service businesses improve their websites, local search visibility, and lead follow-up workflows.')
@section('meta_keywords', 'Ajeet Chaubey, website design, local SEO, Google Business Profile, AI automation, CRM setup, social media management, website performance')

@section('content')

{{-- ═══════HERO SECTION ═════════ --}}
<section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="container">
        <div class="hero-inner">

            {{-- Left: Content --}}
            <div class="hero-content">
                <div class="hero-eyebrow">DIGITAL SOLUTIONS FOR SERVICE BUSINESSES</div>

                <h1 class="hero-title">
                    Better Websites. More Enquiries. Smarter Follow-Ups.
                </h1>

                <p class="hero-subtitle">
                    I help service businesses improve their websites, local search visibility, and lead follow-ups—so customers have a clearer path to getting in touch.
                </p>
                <p class="hero-audience">Working with businesses in the USA, UK, Australia, Canada, New Zealand, and Ireland.</p>

                <div class="hero-actions">
                    <a href="#contact" class="btn-primary" id="requestReviewBtn">
                        <i class="fas fa-search"></i> Request a Website Review
                    </a>
                    <a href="#projects" class="btn-outline" id="viewProjectsBtn">
                        <i class="fas fa-briefcase"></i> Explore My Work
                    </a>
                </div>

                <div class="hero-tech-stack">
                    <span class="hero-tech-label">Website design · Local SEO · Automation · Social media</span>
                </div>
            </div>

            {{-- Right: Service overview --}}
            <div class="hero-visual">
                <div class="hero-panel" aria-label="Digital services overview">
                    <div class="panel-top">
                        <span class="panel-label">Digital support</span>
                    </div>

                    <div class="panel-list-wrap">
                        <div class="mini-label">A clearer path from visit to enquiry</div>
                        <ul class="panel-list">
                            <li><span class="bullet"></span> Website Design</li>
                            <li><span class="bullet"></span> Local SEO</li>
                            <li><span class="bullet"></span> AI Automation</li>
                            <li><span class="bullet"></span> Social Media &amp; Website Performance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═════════ SERVICES SECTION ═══════════ --}}
<section class="section" id="services" aria-labelledby="services-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-cogs"></i> Services</div>
            <h2 id="services-heading">Practical Digital Support for Service Businesses</h2>
            <p>Clear deliverables to help customers find you, understand your services, and get in touch.</p>
        </div>

        <div class="services-grid">
            @forelse($services as $i => $service)
            <article class="service-card reveal reveal-delay-{{ ($i % 3) + 1 }}">
                <div class="service-icon" aria-hidden="true">
                    <i class="{{ filled($service->icon) ? $service->icon : 'fas fa-cog' }}"></i>
                </div>
                <h3>{{ $service->title }}</h3>
                @if(filled($service->description))
                <p>{{ $service->description }}</p>
                @endif
                <div class="service-actions">
                    <a href="#projects" class="service-link" aria-label="Explore projects for {{ $service->title }}">
                        Explore <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="#contact" class="service-link service-link-contact" aria-label="Contact about {{ $service->title }}">
                        Contact <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>
            @empty
            <p class="services-empty">Services will be listed here soon.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ════════ PROJECTS SECTION ═══════════════--}}
<section class="section" id="projects" style="background:var(--bg-secondary)" aria-labelledby="projects-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-briefcase"></i> Portfolio</div>
            <h2 id="projects-heading">Selected Projects</h2>
            <p>A selection of projects and the technologies used to build them.</p>
        </div>

        <div class="projects-grid">
            @forelse($projects as $index => $project)
            @php
            $technologies = collect($project->technologies_array)
                ->filter(fn($technology) => filled($technology))
                ->take(5);
            @endphp
            <article class="project-card reveal reveal-delay-{{ ($index % 3) + 1 }}">
                <div class="project-img">
                    @if(filled($project->image))
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy">
                    @else
                    <div class="project-img-placeholder project-img-missing" role="img" aria-label="Project image unavailable"></div>
                    @endif
                </div>
                <div class="project-body">
                    <h3>{{ $project->title }}</h3>
                    @if(filled($project->description))
                    <p>{{ $project->description }}</p>
                    @endif
                    @if($technologies->isNotEmpty())
                    <div class="project-tags">
                        @foreach($technologies as $technology)
                        <span class="project-tag">{{ $technology }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="project-actions">
                        <a class="primary" href="{{ route('project.show', $project->slug) }}">View Project <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </article>
            @empty
            <p class="projects-empty">Projects will be added here soon.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ════════ DEVELOPMENT PROCESS SECTION ═══════════ --}}
<section class="section process-section" id="process" aria-labelledby="process-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-route"></i> Approach</div>
            <h2 id="process-heading">A Clear, Simple Process</h2>
            <p>From understanding your needs to putting the right solution in place.</p>
        </div>

        <div class="process-steps">
            @php
            $steps = [
            ['01', 'fas fa-comments', 'Understand', 'Discuss your business and what you need.'],
            ['02', 'fas fa-drafting-compass','Plan','Agree on a clear scope and priorities.'],
            ['03', 'fas fa-paint-brush', 'Design', 'Create the agreed look and customer experience.'],
            ['04', 'fas fa-check', 'Deliver', 'Put the agreed work in place.'],
            ['05', 'fas fa-clipboard-check', 'Review', 'Check the work together before completion.'],
            ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="process-step reveal reveal-delay-{{ $i + 1 }}">
                <div class="process-num" aria-hidden="true">
                    <i class="{{ $step[1] }}"></i>
                </div>
                <h4>{{ $step[2] }}</h4>
                <p>{{ $step[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     TESTIMONIALS SECTION
     ═══════════════════════════════════════════════════ --}}
@if($testimonials->isNotEmpty())
<section class="section" id="testimonials" style="background:var(--bg-secondary)" aria-labelledby="testimonials-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-star"></i> Client Feedback</div>
            <h2 id="testimonials-heading">What Clients Say</h2>
            <p>Client feedback.</p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $index => $testimonial)
            <div class="testimonial-card reveal reveal-delay-{{ ($index % 3) + 1 }}">
                <div class="testimonial-quote" aria-hidden="true">"</div>
                <p class="testimonial-text">{{ $testimonial->message }}</p>
                <div class="testimonial-stars" aria-label="{{ $testimonial->rating }} out of 5 stars">
                    @for($s = 1; $s <= 5; $s++)
                        <i class="{{ $s <= $testimonial->rating ? 'fas' : 'far' }} fa-star"></i>
                        @endfor
                </div>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">
                        @if($testimonial->avatar)
                        <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->name }}">
                        @else
                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <div class="testimonial-name">{{ $testimonial->name }}</div>
                        <div class="testimonial-role">
                            {{ $testimonial->role }}{{ $testimonial->company ? ', ' . $testimonial->company : '' }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════ CONTACT SECTION ════════ --}}
<section class="section contact-section" id="contact" aria-labelledby="contact-heading">
    <div class="container">
        <div class="contact-grid">

            {{-- Contact Info --}}
            <div class="contact-info reveal">
                <div class="eyebrow"><i class="fas fa-envelope"></i> Get In Touch</div>
                <h2 id="contact-heading">Discuss Your Project</h2>
                <p>Tell me what your business needs. I’ll get back to you to discuss a suitable next step.</p>

                <div class="contact-channels">
                    <a href="mailto:info@studypyramid.com" class="contact-channel" id="emailChannel">
                        <div class="contact-channel-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                        <div>
                            <span class="contact-channel-label">Email</span>
                            <span class="contact-channel-val">info@studypyramid.com</span>
                        </div>
                    </a>
                    <a href="https://wa.me/918449627622" target="_blank" rel="noopener" class="contact-channel" id="whatsappChannel">
                        <div class="contact-channel-icon" style="color:var(--success);background:rgba(0,212,170,.1)" aria-hidden="true"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <span class="contact-channel-label">WhatsApp</span>
                            <span class="contact-channel-val">+91 8449627622</span>
                        </div>
                    </a>
                    <a href="https://linkedin.com/in/ajeet" target="_blank" rel="noopener" class="contact-channel" id="linkedinChannel">
                        <div class="contact-channel-icon" style="color:#0a66c2;background:rgba(10,102,194,.1)" aria-hidden="true"><i class="fab fa-linkedin-in"></i></div>
                        <div>
                            <span class="contact-channel-label">LinkedIn</span>
                            <span class="contact-channel-val">linkedin.com/in/ajeet</span>
                        </div>
                    </a>
                    <a href="https://github.com/ajeet" target="_blank" rel="noopener" class="contact-channel" id="githubChannel">
                        <div class="contact-channel-icon" aria-hidden="true"><i class="fab fa-github"></i></div>
                        <div>
                            <span class="contact-channel-label">GitHub</span>
                            <span class="contact-channel-val">github.com/ajeet</span>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="contact-form-card reveal reveal-delay-2">
                @if(session('success'))
                <div class="alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_name">Your Name <span style="color:var(--danger)">*</span></label>
                            <input type="text" id="contact_name" name="name"
                                value="{{ old('name') }}"
                                placeholder="Your name"
                                required
                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                            @error('name')<span style="color:var(--danger);font-size:.8rem">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email Address <span style="color:var(--danger)">*</span></label>
                            <input type="email" id="contact_email" name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                required
                                class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                            @error('email')<span style="color:var(--danger);font-size:.8rem">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_phone">Phone (Optional)</label>
                            <input type="tel" id="contact_phone" name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Include country code">
                        </div>
                        <div class="form-group">
                            <label for="contact_subject">Subject</label>
                            <input type="text" id="contact_subject" name="subject"
                                value="{{ old('subject') }}"
                            placeholder="Website review or project inquiry">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_business_type">Business Type <span class="text-muted">(Optional)</span></label>
                            <select id="contact_business_type" name="business_type"
                                class="{{ $errors->has('business_type') ? 'is-invalid' : '' }}"
                                aria-invalid="{{ $errors->has('business_type') ? 'true' : 'false' }}">
                                <option value="">Choose a business type</option>
                                @foreach(['Home services', 'Healthcare and clinics', 'Professional services', 'Beauty and wellness', 'Other service business'] as $businessType)
                                <option value="{{ $businessType }}" @selected(old('business_type') === $businessType)>{{ $businessType }}</option>
                                @endforeach
                            </select>
                            @error('business_type')<span style="color:var(--danger);font-size:.8rem">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="contact_service_required">Service Required <span class="text-muted">(Optional)</span></label>
                            <select id="contact_service_required" name="service_required"
                                class="{{ $errors->has('service_required') ? 'is-invalid' : '' }}"
                                aria-invalid="{{ $errors->has('service_required') ? 'true' : 'false' }}">
                                <option value="">Choose a service</option>
                                @foreach(['Website design or redesign', 'Local SEO and Google Business Profile', 'AI automation and CRM', 'Social media and website performance', 'Multiple services', 'Not sure yet'] as $serviceRequired)
                                <option value="{{ $serviceRequired }}" @selected(old('service_required') === $serviceRequired)>{{ $serviceRequired }}</option>
                                @endforeach
                            </select>
                            @error('service_required')<span style="color:var(--danger);font-size:.8rem">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_message">Your Message <span style="color:var(--danger)">*</span></label>
                        <textarea id="contact_message" name="message"
                            rows="5"
                            placeholder="Tell me about your project..."
                            required
                            class="{{ $errors->has('message') ? 'is-invalid' : '' }}">{{ old('message') }}</textarea>
                        @error('message')<span style="color:var(--danger);font-size:.8rem">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn-primary" id="contactSubmitButton" style="width:100%;justify-content:center;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection