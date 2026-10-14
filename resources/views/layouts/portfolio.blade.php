<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Ajeet Chaubey provides website design, local SEO, AI automation, and digital services for service businesses.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Ajeet Chaubey, website design, local SEO, AI automation, digital services')">
    <meta name="author" content="Ajeet Chaubey">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Ajeet Chaubey | Digital Services')">
    <meta property="og:description" content="@yield('meta_description', 'Ajeet Chaubey provides website design, local SEO, AI automation, and digital services for service businesses.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <title>@yield('title', 'Ajeet Chaubey | Digital Services')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Portfolio CSS -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    @stack('styles')
</head>

<body>

    <!-- ─── Navigation ──────────────────────────────────── -->
    <nav class="portfolio-nav" id="mainNav" role="navigation" aria-label="Main navigation">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="nav-logo">AC<span>.</span></a>

            <ul class="nav-links">
                <li><a href="{{ route('home') }}#services" class="hover-underline">Services</a></li>
                <li><a href="{{ route('home') }}#projects" class="hover-underline">Projects</a></li>
                <li><a href="{{ route('home') }}#process" class="hover-underline">Process</a></li>
                <li><a href="{{ route('home') }}#contact" class="hover-underline">Contact</a></li>
            </ul>

            <div class="nav-right">
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme" title="Toggle dark/light mode">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </button>
                <a href="{{ route('home') }}#contact" class="nav-hire">Discuss Your Project</a>
                <button class="hamburger" id="hamburger" aria-label="Menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile navigation">
        <a href="{{ route('home') }}#services" onclick="closeMobile()">Services</a>
        <a href="{{ route('home') }}#projects" onclick="closeMobile()">Projects</a>
        <a href="{{ route('home') }}#process" onclick="closeMobile()">Process</a>
        <a href="{{ route('home') }}#contact" onclick="closeMobile()">Contact</a>
        @auth
        <a href="{{ route('admin.dashboard') }}" onclick="closeMobile()">
            <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
        </a>
        @endauth
    </div>

    <!-- ─── Page Content ─── -->
    @yield('content')

    <!-- ─── Footer ─────────────────────────────────────── -->
    <footer class="portfolio-footer">
        <div class="container footer-inner">
            <a href="{{ route('home') }}" class="footer-logo">AC<span>.</span></a>
            <p class="footer-copy">
                &copy; {{ date('Y') }} Ajeet Chaubey. Digital services for growing businesses.
            </p>
            <div class="footer-links">
                <a href="https://github.com/ajeet" target="_blank" rel="noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/ajeet" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://wa.me/918449627622" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:info@studypyramid.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <!-- ─── Scripts ─────────────────────────────────────── -->
    <script>
        // ── Theme Toggle ──────────────────────
        const html = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');

        function applyTheme(theme) {
            html.setAttribute('data-theme', theme);
            themeIcon.className = theme === 'dark' ? 'fas fa-moon' : 'fas fa-sun';
            localStorage.setItem('portfolio-theme', theme);
        }

        const savedTheme = localStorage.getItem('portfolio-theme') || 'dark';
        applyTheme(savedTheme);

        themeToggle.addEventListener('click', () => {
            applyTheme(html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
        });

        // ── Navbar scroll ─────────────────────
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        }, {
            passive: true
        });

        // ── Hamburger menu ────────────────────
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', isOpen);
        });

        function closeMobile() {
            mobileMenu.classList.remove('open');
        }
        document.addEventListener('click', e => {
            if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.remove('open');
            }
        });

        // ── Reveal on scroll ──────────────────
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(el => {
                if (el.isIntersecting) {
                    el.target.classList.add('visible');
                    // Animate skill bars
                    const bars = el.target.querySelectorAll('.skill-bar-fill[data-width]');
                    bars.forEach(bar => {
                        setTimeout(() => {
                            bar.style.width = bar.dataset.width + '%';
                        }, 100);
                    });
                }
            });
        }, {
            threshold: 0.12
        });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // ── Contact form validation ─────────────────
        const contactForm = document.getElementById('contactForm');
        const contactSubmitButton = document.getElementById('contactSubmitButton');

        if (contactForm && contactSubmitButton) {
            const setButtonState = (isSubmitting) => {
                contactSubmitButton.disabled = isSubmitting;
                contactSubmitButton.innerHTML = isSubmitting
                    ? '<i class="fas fa-spinner fa-spin"></i> Sending...'
                    : '<i class="fas fa-paper-plane"></i> Send Message';
            };

            contactForm.addEventListener('submit', function (event) {
                if (!contactForm.checkValidity()) {
                    event.preventDefault();
                    contactForm.reportValidity();
                    return;
                }

                setButtonState(true);
            });
        }

        // ── Active nav link ───────────────────
        const sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY + 90;
            sections.forEach(sec => {
                const top = sec.offsetTop;
                const height = sec.offsetHeight;
                const id = sec.getAttribute('id');
                const link = document.querySelector(`.nav-links a[href*="#${id}"]`);
                if (link) link.classList.toggle('active', scrollY >= top && scrollY < top + height);
            });
        }, {
            passive: true
        });
    </script>

    @stack('scripts')
</body>

</html>