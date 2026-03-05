@extends('layouts.admin')
@section('title', 'Manage Testimonials')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Testimonials</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Testimonials</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0"><i class="fas fa-star mr-2"></i>All Testimonials</h3>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm" id="addTestimonialBtn">
                    <i class="fas fa-plus"></i> Add Testimonial
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover datatable" id="testimonialsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Company / Role</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>
                                <strong>{{ $t->name }}</strong><br>
                                <small class="text-muted" style="max-width:200px;display:block">
                                    {{ Str::limit($t->message, 60) }}
                                </small>
                            </td>
                            <td>
                                @if($t->role) <div>{{ $t->role }}</div> @endif
                                @if($t->company) <small class="text-muted">{{ $t->company }}</small> @endif
                            </td>
                            <td>
                                @for($s=1; $s<=5; $s++)
                                    <i class="fas fa-star {{ $s <= $t->rating ? 'text-warning' : 'text-muted' }}" style="font-size:.75rem"></i>
                                    @endfor
                            </td>
                            <td>
                                @if($t->is_active)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-secondary">Hidden</span>
                                @endif
                            </td>
                            <td>{{ $t->order }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $t->id) }}"
                                    method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this testimonial?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection