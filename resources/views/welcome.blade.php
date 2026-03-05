@extends('layouts.portfolio')

@section('title', 'Ajeet Chaubey | Backend Software Engineer')
@section('meta_description', 'I build scalable backend systems, secure REST APIs and modern data architectures. Hire a professional backend engineer.')

@section('content')

{{-- ═══════════════════════════════════════════════════
     HERO SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="container">
        <div class="hero-inner">

            {{-- Left: Content --}}
            <div class="hero-content">
                <div class="hero-eyebrow">Available for Freelance Projects</div>

                <h1 class="hero-title">
                    I Build <span class="gradient-text">Scalable Backend</span><br>
                    Systems &amp; APIs
                </h1>

                <p class="hero-subtitle">
                    Helping startups and businesses build reliable backend systems and modern web platforms.
                    Clean code. Secure architecture. Delivered on time.
                </p>

                <div class="hero-actions">
                    <a href="#projects" class="btn-primary" id="viewProjectsBtn">
                        <i class="fas fa-rocket"></i> View Projects
                    </a>
                    <a href="#contact" class="btn-outline" id="hireMeBtn">
                        <i class="fas fa-paper-plane"></i> Hire Me
                    </a>
                </div>

                <div class="hero-tech-stack">
                    <span class="hero-tech-label">Tech Stack:</span>
                    @foreach(['PHP', 'Node.js', 'Python', 'Go', 'MySQL', 'Redis', 'Docker'] as $tech)
                    <span class="badge-tech">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Right: Code Window --}}
            <div class="hero-visual">
                <div class="hero-code-window" aria-hidden="true">
                    <div class="code-titlebar">
                        <div class="code-dot red"></div>
                        <div class="code-dot yellow"></div>
                        <div class="code-dot green"></div>
                        <span class="code-filename">ProjectController.php</span>
                    </div>
                    <div class="code-body">
                        <div class="code-line"><span class="code-ln">1</span><span class="c-purple">namespace</span> <span class="c-white">App\Http\Controllers;</span></div>
                        <div class="code-line"><span class="code-ln">2</span></div>
                        <div class="code-line"><span class="code-ln">3</span><span class="c-purple">use</span> <span class="c-blue">App\Models\Project</span><span class="c-white">;</span></div>
                        <div class="code-line"><span class="code-ln">4</span><span class="c-purple">use</span> <span class="c-blue">Illuminate\Http\Request</span><span class="c-white">;</span></div>
                        <div class="code-line"><span class="code-ln">5</span></div>
                        <div class="code-line"><span class="code-ln">6</span><span class="c-purple">class</span> <span class="c-yellow">ProjectController</span> <span class="c-purple">extends</span> <span class="c-blue">Controller</span></div>
                        <div class="code-line"><span class="code-ln">7</span><span class="c-white">{</span></div>
                        <div class="code-line"><span class="code-ln">8</span>&nbsp;&nbsp;<span class="c-purple">public function</span> <span class="c-green">index</span><span class="c-white">()</span></div>
                        <div class="code-line"><span class="code-ln">9</span>&nbsp;&nbsp;<span class="c-white">{</span></div>
                        <div class="code-line"><span class="code-ln">10</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c-orange">$projects</span> <span class="c-white">= </span><span class="c-blue">Project</span><span class="c-white">::</span><span class="c-green">ordered</span><span class="c-white">()-></span><span class="c-green">get</span><span class="c-white">();</span></div>
                        <div class="code-line"><span class="code-ln">11</span></div>
                        <div class="code-line"><span class="code-ln">12</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c-purple">return</span> <span class="c-blue">view</span><span class="c-white">(</span><span class="c-red">'portfolio'</span><span class="c-white">, </span><span class="c-green">compact</span><span class="c-white">(</span><span class="c-red">'projects'</span><span class="c-white">));</span></div>
                        <div class="code-line"><span class="code-ln">13</span>&nbsp;&nbsp;<span class="c-white">}</span></div>
                        <div class="code-line"><span class="code-ln">14</span><span class="c-white">}</span></div>
                    </div>
                </div>

                {{-- Floating cards --}}
                <div class="hero-floating-card card-1" aria-hidden="true">
                    <div class="fc-icon" style="background:rgba(255,94,94,.15);">🔴</div>
                    <div>
                        <div style="font-size:.7rem;color:var(--text-muted)">Status</div>
                        <div>API Live ✓</div>
                    </div>
                </div>
                <div class="hero-floating-card card-2" aria-hidden="true">
                    <div class="fc-icon" style="background:rgba(0,212,170,.15);">⚡</div>
                    <div>
                        <div style="font-size:.7rem;color:var(--text-muted)">Response</div>
                        <div>42ms avg</div>
                    </div>
                </div>
                <div class="hero-floating-card card-3" aria-hidden="true">
                    <div class="fc-icon" style="background:rgba(108,99,255,.15);">🛡️</div>
                    <div>
                        <div style="font-size:.7rem;color:var(--text-muted)">Security</div>
                        <div>A+ Grade</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     TRUST / CREDIBILITY SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="trust-section section-sm" id="trust" aria-label="Credibility stats">
    <div class="container">
        <div class="trust-grid reveal">
            <div class="trust-item">
                <div class="trust-number">3+</div>
                <div class="trust-label">Production Ready Projects</div>
            </div>
            <div class="trust-item">
                <div class="trust-number">REST</div>
                <div class="trust-label">API Development Expert</div>
            </div>
            <div class="trust-item">
                <div class="trust-number">100%</div>
                <div class="trust-label">Secure Architectures</div>
            </div>
            <div class="trust-item">
                <div class="trust-number">MVC</div>
                <div class="trust-label">Clean Backend Architecture</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     SERVICES SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section" id="services" aria-labelledby="services-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-cogs"></i> What I Offer</div>
            <h2 id="services-heading">Services I Provide</h2>
            <p>From building scalable backends to migrating legacy systems — I've got you covered.</p>
        </div>

        <div class="services-grid">
            @forelse($services as $index => $service)
            <div class="service-card reveal reveal-delay-{{ ($index % 3) + 1 }}">
                <div class="service-icon" aria-hidden="true">
                    <i class="{{ $service->icon ?? 'fas fa-code' }}"></i>
                </div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
            </div>
            @empty
            {{-- Default services if none in DB --}}
            @php
            $defaultServices = [
            ['fas fa-server', 'Backend System Development', 'Building scalable, maintainable server-side systems with clean architecture across multiple languages.'],
            ['fas fa-project-diagram', 'REST & GraphQL API Design', 'Building secure, well-documented APIs for mobile apps, internal services, and third-party integrations.'],
            ['fas fa-database', 'Database Architecture & Scaling', 'Designing efficient schemas, optimizing slow queries, and scaling databases like MySQL and PostgreSQL.'],
            ['fas fa-cloud', 'Cloud Deployment & DevOps', 'Deploying and scaling applications on AWS/GCP, managing Docker containers, and setting up CI/CD workflows.'],
            ['fas fa-cogs', 'Microservices & Message Queues', 'Architecting robust microservice ecosystems with message brokers like RabbitMQ, Kafka, and Redis.'],
            ['fas fa-bug', 'Performance Optimization', 'Profiling bottlenecks, implementing advanced caching layers, and optimizing overall backend performance.'],
            ];
            @endphp
            @foreach($defaultServices as $i => $svc)
            <div class="service-card reveal reveal-delay-{{ ($i % 3) + 1 }}">
                <div class="service-icon" aria-hidden="true">
                    <i class="{{ $svc[0] }}"></i>
                </div>
                <h3>{{ $svc[1] }}</h3>
                <p>{{ $svc[2] }}</p>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     PROJECTS SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section" id="projects" style="background:var(--bg-secondary)" aria-labelledby="projects-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-rocket"></i> Portfolio</div>
            <h2 id="projects-heading">Featured Projects</h2>
            <p>Real-world backend systems and web applications I've built for clients and personal projects.</p>
        </div>

        <div class="projects-grid">
            {{-- Static Project 1 --}}
            <article class="project-card reveal reveal-delay-1" aria-labelledby="project-1">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80" alt="E-Commerce API" loading="lazy">
                </div>
                <div class="project-body">
                    <h3 id="project-1">Headless E-Commerce API</h3>
                    <p>A high-performance RESTful API for a headless e-commerce platform. Features advanced caching, queue processing, and payment gateway integration.</p>
                    <div class="project-tags">
                        <span class="project-tag">Laravel</span>
                        <span class="project-tag">MySQL</span>
                        <span class="project-tag">Redis</span>
                        <span class="project-tag">Stripe API</span>
                    </div>
                </div>
            </article>

            {{-- Static Project 2 --}}
            <article class="project-card reveal reveal-delay-2" aria-labelledby="project-2">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" alt="SaaS Analytics" loading="lazy">
                </div>
                <div class="project-body">
                    <h3 id="project-2">SaaS Analytics Dashboard</h3>
                    <p>A multi-tenant SaaS application providing real-time analytics. Built using modern backend frameworks and complex SQL queries for fast data aggregation.</p>
                    <div class="project-tags">
                        <span class="project-tag">Laravel</span>
                        <span class="project-tag">Vue.js</span>
                        <span class="project-tag">Multi-Tenancy</span>
                        <span class="project-tag">Cron Jobs</span>
                    </div>
                </div>
            </article>

            {{-- Static Project 3 --}}
            <article class="project-card reveal reveal-delay-3" aria-labelledby="project-3">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="CRM System" loading="lazy">
                </div>
                <div class="project-body">
                    <h3 id="project-3">Custom CRM System</h3>
                    <p>A tailored Customer Relationship Management tool for a real estate agency. Includes role-based access, automated email reporting, and lead tracking.</p>
                    <div class="project-tags">
                        <span class="project-tag">Node.js</span>
                        <span class="project-tag">Express</span>
                        <span class="project-tag">MongoDB</span>
                        <span class="project-tag">React</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     SKILLS SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section" id="skills" aria-labelledby="skills-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-tools"></i> Expertise</div>
            <h2 id="skills-heading">Technical Skills</h2>
            <p>A well-rounded backend developer with solid foundations across the full technology stack.</p>
        </div>

        <div class="skills-showcase">
            <div class="skill-pill reveal">
                <i class="fab fa-laravel" style="color: #FF2D20;"></i>
                <span>Laravel</span>
            </div>
            <div class="skill-pill reveal reveal-delay-1">
                <i class="fab fa-php" style="color: #777BB4;"></i>
                <span>PHP 8+</span>
            </div>
            <div class="skill-pill reveal reveal-delay-2">
                <i class="fas fa-database" style="color: #4479A1;"></i>
                <span>MySQL</span>
            </div>
            <div class="skill-pill reveal reveal-delay-3">
                <i class="fas fa-server" style="color: #00C7B7;"></i>
                <span>REST API</span>
            </div>
            <div class="skill-pill reveal reveal-delay-1">
                <i class="fab fa-vuejs" style="color: #4FC08D;"></i>
                <span>Vue.js</span>
            </div>
            <div class="skill-pill reveal reveal-delay-2">
                <i class="fab fa-js" style="color: #F7DF1E;"></i>
                <span>JavaScript</span>
            </div>
            <div class="skill-pill reveal reveal-delay-3">
                <i class="fab fa-github" style="color: #fff;"></i>
                <span>Git/GitHub</span>
            </div>
            <div class="skill-pill reveal reveal-delay-1">
                <i class="fab fa-docker" style="color: #2496ED;"></i>
                <span>Docker</span>
            </div>
            <div class="skill-pill reveal reveal-delay-2">
                <i class="fas fa-wind" style="color: #38B2AC;"></i>
                <span>Tailwind CSS</span>
            </div>
            <div class="skill-pill reveal reveal-delay-3">
                <i class="fas fa-cubes" style="color: #FF2D20;"></i>
                <span>Redis</span>
            </div>
            <div class="skill-pill reveal reveal-delay-1">
                <i class="fas fa-terminal" style="color: #ccc;"></i>
                <span>Linux Server</span>
            </div>
            <div class="skill-pill reveal reveal-delay-2">
                <i class="fab fa-aws" style="color: #FF9900;"></i>
                <span>AWS</span>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     DEVELOPMENT PROCESS SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section process-section" id="process" aria-labelledby="process-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-route"></i> How I Work</div>
            <h2 id="process-heading">My Development Process</h2>
            <p>A structured, transparent workflow that ensures on-time delivery and excellent results.</p>
        </div>

        <div class="process-steps">
            @php
            $steps = [
            ['01', 'fas fa-comments', 'Requirement Discussion', 'Deep-dive into your business needs, goals, and technical requirements.'],
            ['02', 'fas fa-drafting-compass','Planning & Architecture','System design, database schema, API structure, and tech stack selection.'],
            ['03', 'fas fa-code', 'Development', 'Clean, well-documented code following modern design patterns and solid architecture.'],
            ['04', 'fas fa-vial', 'Testing & Optimization', 'Thorough testing, performance tuning, and security hardening.'],
            ['05', 'fas fa-cloud-upload-alt','Deployment & Support', 'Smooth deployment and ongoing maintenance for continuous reliability.'],
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
     GITHUB SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section" id="github" aria-labelledby="github-heading">
    <div class="container">
        <div class="github-card reveal">
            <i class="fab fa-github github-icon" aria-hidden="true"></i>
            <h3 id="github-heading">Open Source Contributions</h3>
            <p>I actively contribute to open-source projects and share my work on GitHub.<br>Check out my repositories and code quality.</p>

            <div class="github-stats" aria-label="GitHub statistics">
                <div>
                    <div class="github-stat-num">10+</div>
                    <div class="github-stat-lbl">Repositories</div>
                </div>
                <div>
                    <div class="github-stat-num">3+</div>
                    <div class="github-stat-lbl">Projects</div>
                </div>
                <div>
                    <div class="github-stat-num">100%</div>
                    <div class="github-stat-lbl">Clean Code</div>
                </div>
            </div>

            <a href="https://github.com/ajeet" target="_blank" rel="noopener" class="btn-primary" id="githubProfileBtn">
                <i class="fab fa-github"></i> View GitHub Profile
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     TESTIMONIALS SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section" id="testimonials" style="background:var(--bg-secondary)" aria-labelledby="testimonials-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="eyebrow"><i class="fas fa-star"></i> Client Reviews</div>
            <h2 id="testimonials-heading">What Clients Say</h2>
            <p>Real feedback from the clients I've worked with.</p>
        </div>

        <div class="testimonials-grid">
            @forelse($testimonials as $index => $testimonial)
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
            @empty
            {{-- Placeholder when no testimonials yet --}}
            @foreach(['Rajesh Kumar, CEO, TechStartup', 'Priya Sharma, Product Manager, WebApp Co.', 'Amit Singh, Founder, Digital Agency'] as $i => $person)
            @php [$pName, $pRole, $pComp] = array_map('trim', explode(',', $person)); @endphp
            <div class="testimonial-card reveal reveal-delay-{{ $i + 1 }}">
                <div class="testimonial-quote" aria-hidden="true">"</div>
                <p class="testimonial-text">
                    @if($i === 0) Ajeet built our core backend with clean architecture and excellent performance. Very professional and delivered ahead of schedule.
                    @elseif($i === 1) The REST APIs Ajeet developed are fast, well-documented and secure. I'd highly recommend him for any backend engineering project.
                    @else Outstanding work on our system architecture migration. The code quality is top-notch and the system handles high traffic easily now. Highly recommend!
                    @endif
                </p>
                <div class="testimonial-stars" aria-hidden="true">
                    @for($s = 1; $s <= 5; $s++)<i class="fas fa-star"></i>@endfor
                </div>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">{{ substr($pName, 0, 1) }}</div>
                    <div>
                        <div class="testimonial-name">{{ $pName }}</div>
                        <div class="testimonial-role">{{ $pRole }}, {{ $pComp }}</div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     CONTACT SECTION
     ═══════════════════════════════════════════════════ --}}
<section class="section contact-section" id="contact" aria-labelledby="contact-heading">
    <div class="container">
        <div class="contact-grid">

            {{-- Contact Info --}}
            <div class="contact-info reveal">
                <div class="eyebrow"><i class="fas fa-envelope"></i> Get In Touch</div>
                <h2 id="contact-heading">Let's Work<br>Together</h2>
                <p>Have a project in mind? Looking for a reliable Backend Software Engineer? I'm ready to help you build something amazing. Let's start a conversation.</p>

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

                <form action="{{ route('contact.store') }}" method="POST" id="contactForm" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_name">Your Name <span style="color:var(--danger)">*</span></label>
                            <input type="text" id="contact_name" name="name"
                                value="{{ old('name') }}"
                                placeholder="Rajesh Kumar"
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
                                placeholder="+91 9876543210">
                        </div>
                        <div class="form-group">
                            <label for="contact_subject">Subject</label>
                            <input type="text" id="contact_subject" name="subject"
                                value="{{ old('subject') }}"
                                placeholder="Backend Project Inquiry">
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
                    <button type="submit" class="btn-primary" id="submitContactBtn" style="width:100%;justify-content:center;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection