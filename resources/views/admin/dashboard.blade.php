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

    </div>
</section>
@endsection