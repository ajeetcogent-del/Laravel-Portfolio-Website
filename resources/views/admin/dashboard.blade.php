@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@php
$projectCount = \App\Models\Project::count();
$testimonialCount = \App\Models\Testimonial::count();
$unreadContacts = \App\Models\Contact::where('is_read', false)->count();
$totalContacts = \App\Models\Contact::count();
$skillCount = \App\Models\Skill::count();
$serviceCount = \App\Models\Service::count();
$userCount = \App\Models\User::count();
@endphp

<section class="content">
    <div class="container-fluid">

        {{-- Welcome Banner --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card" style="background:linear-gradient(135deg,#6c63ff,#a78bfa);border:none;color:#fff">
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <h4 class="mb-1" style="color:#fff">
                                👋 Welcome back, {{ Auth::user()->name }}!
                            </h4>
                            <p class="mb-0" style="opacity:.85">
                                Manage your portfolio content from here. Your portfolio website is live.
                            </p>
                        </div>
                        <a href="{{ route('home') }}" target="_blank"
                            class="btn btn-light btn-sm font-weight-bold">
                            <i class="fas fa-external-link-alt mr-1"></i> View Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── Portfolio Stats ─── --}}
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $projectCount }}</h3>
                        <p>Projects</p>
                    </div>
                    <div class="icon"><i class="fas fa-rocket"></i></div>
                    <a href="{{ route('admin.projects.index') }}" class="small-box-footer">
                        Manage <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $unreadContacts }} <sup style="font-size:18px">new</sup></h3>
                        <p>Contact Messages</p>
                    </div>
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">
                        View All <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $testimonialCount }}</h3>
                        <p>Testimonials</p>
                    </div>
                    <div class="icon"><i class="fas fa-star"></i></div>
                    <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                        Manage <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $userCount }}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                        Manage <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- ─── Quick Actions & Recent Messages ─── --}}
        <div class="row">

            {{-- Quick Actions --}}
            <div class="col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-bolt mr-2"></i>Quick Actions</h3>
                    </div>
                    <div class="card-body p-2">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.projects.create') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-plus-circle text-primary mr-2"></i> Add New Project
                            </a>
                            <a href="{{ route('admin.testimonials.create') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-star text-warning mr-2"></i> Add Testimonial
                            </a>
                            <a href="{{ route('admin.skills.create') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-tools text-success mr-2"></i> Add Skill
                            </a>
                            <a href="{{ route('admin.services.create') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-cogs text-info mr-2"></i> Add Service
                            </a>
                            <a href="{{ route('admin.contacts.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-inbox text-danger mr-2"></i>
                                View Messages
                                @if($unreadContacts > 0)
                                <span class="badge badge-danger float-right mt-1">{{ $unreadContacts }} new</span>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Content Summary --}}
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Content Summary</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-rocket text-primary mr-2"></i>Projects</td>
                                    <td class="text-right"><strong>{{ $projectCount }}</strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-star text-warning mr-2"></i>Testimonials</td>
                                    <td class="text-right"><strong>{{ $testimonialCount }}</strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-tools text-success mr-2"></i>Skills</td>
                                    <td class="text-right"><strong>{{ $skillCount }}</strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-cogs text-info mr-2"></i>Services</td>
                                    <td class="text-right"><strong>{{ $serviceCount }}</strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-envelope text-danger mr-2"></i>Total Messages</td>
                                    <td class="text-right"><strong>{{ $totalContacts }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Recent Messages --}}
            <div class="col-md-8">
                <div class="card card-outline card-warning">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-inbox mr-2"></i>Recent Contact Messages
                        </h3>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-warning">
                            View All
                        </a>
                    </div>
                    <div class="card-body p-0">
                        @php $recentContacts = \App\Models\Contact::orderBy('created_at','desc')->take(6)->get(); @endphp
                        @if($recentContacts->count())
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentContacts as $msg)
                                    <tr class="{{ !$msg->is_read ? 'table-warning' : '' }}">
                                        <td>
                                            @if(!$msg->is_read)
                                            <span class="badge badge-warning">New</span>
                                            @else
                                            <span class="badge badge-light border">Read</span>
                                            @endif
                                        </td>
                                        <td>{{ $msg->name }}<br><small class="text-muted">{{ $msg->email }}</small></td>
                                        <td>{{ Str::limit($msg->subject ?: $msg->message, 45) }}</td>
                                        <td><small>{{ $msg->created_at->diffForHumans() }}</small></td>
                                        <td>
                                            <a href="{{ route('admin.contacts.show', $msg->id) }}"
                                                class="btn btn-xs btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                            No messages yet. Contact form submissions will appear here.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Projects --}}
        @if($projectCount > 0)
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0"><i class="fas fa-rocket mr-2"></i>Recent Projects</h3>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-primary">Manage All</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach(\App\Models\Project::orderBy('created_at','desc')->take(4)->get() as $proj)
                            <div class="col-md-3 col-6">
                                <div class="card card-body border p-3">
                                    @if($proj->image)
                                    <img src="{{ asset('storage/'.$proj->image) }}"
                                        style="width:100%;height:80px;object-fit:cover;border-radius:6px;margin-bottom:8px"
                                        alt="{{ $proj->title }}">
                                    @endif
                                    <strong style="font-size:.9rem">{{ Str::limit($proj->title, 30) }}</strong>
                                    <div class="mt-1">
                                        @if($proj->featured)
                                        <span class="badge badge-warning badge-sm">Featured</span>
                                        @endif
                                    </div>
                                    <div class="mt-2 d-flex gap-1">
                                        <a href="{{ route('admin.projects.edit', $proj->id) }}"
                                            class="btn btn-xs btn-warning flex-fill text-center">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('project.show', $proj->slug) }}"
                                            target="_blank"
                                            class="btn btn-xs btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection