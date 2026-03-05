<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('home') }}" class="brand-link" target="_blank">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Portfolio Admin</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Guest' }}</a>
                <small class="text-muted">
                    @if(Auth::check())
                    @if(Auth::user()->role === \App\Models\User::ROLE_ADMIN)
                    <span class="badge badge-success badge-sm">Admin</span>
                    @elseif(Auth::user()->role === \App\Models\User::ROLE_AGENT)
                    <span class="badge badge-info badge-sm">Agent</span>
                    @else
                    <span class="badge badge-primary badge-sm">User</span>
                    @endif
                    @endif
                </small>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- ── Admin Menu ── --}}
                @if(Auth::check() && Auth::user()->role === \App\Models\User::ROLE_ADMIN)

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- ── Portfolio Management ── --}}
                <li class="nav-header">PORTFOLIO</li>

                {{-- Projects --}}
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-rocket"></i>
                        <p>Projects</p>
                    </a>
                </li>

                {{-- Testimonials --}}
                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Testimonials</p>
                    </a>
                </li>

                {{-- Contacts --}}
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact Messages
                            @php
                            $unreadCount = \App\Models\Contact::where('is_read', false)->count();
                            @endphp
                            @if($unreadCount > 0)
                            <span class="right badge badge-danger">{{ $unreadCount }}</span>
                            @endif
                        </p>
                    </a>
                </li>

                {{-- Skills --}}
                <li class="nav-item">
                    <a href="{{ route('admin.skills.index') }}" class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Skills</p>
                    </a>
                </li>

                {{-- Services --}}
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Services</p>
                    </a>
                </li>

                {{-- ── Site Management ── --}}
                <li class="nav-header">MANAGEMENT</li>

                {{-- Users --}}
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manage Users</p>
                    </a>
                </li>

                {{-- Blogs --}}
                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blogs</p>
                    </a>
                </li>

                {{-- Posts --}}
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link {{ request()->routeIs('post.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Posts</p>
                    </a>
                </li>

                {{-- View Website --}}
                <li class="nav-header">WEBSITE</li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-external-link-alt"></i>
                        <p>View Portfolio</p>
                    </a>
                </li>

                {{-- ── Agent Menu ── --}}
                @elseif(Auth::check() && Auth::user()->role === \App\Models\User::ROLE_AGENT)

                <li class="nav-item">
                    <a href="{{ route('agent.dashboard') }}" class="nav-link {{ request()->routeIs('agent.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('agent.users.index') }}" class="nav-link {{ request()->routeIs('agent.users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>View Users</p>
                    </a>
                </li>

                {{-- ── User Menu ── --}}
                @else

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @endif

                {{-- Posts (all roles) --}}
                @if(Auth::check() && Auth::user()->role !== \App\Models\User::ROLE_ADMIN)
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link {{ request()->routeIs('post.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Posts</p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>

    </div>
</aside>