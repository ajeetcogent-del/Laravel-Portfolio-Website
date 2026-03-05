@extends('layouts.admin')
@section('title', 'Manage Projects')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Projects</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0"><i class="fas fa-rocket mr-2"></i>All Projects</h3>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm" id="addProjectBtn">
                    <i class="fas fa-plus"></i> Add Project
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover datatable" id="projectsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Technologies</th>
                            <th>Featured</th>
                            <th>Order</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}"
                                    alt="{{ $project->title }}"
                                    style="width:60px;height:40px;object-fit:cover;border-radius:6px">
                                @else
                                <span class="badge badge-secondary"><i class="fas fa-code"></i></span>
                                @endif
                            </td>
                            <td><strong>{{ $project->title }}</strong><br><small class="text-muted">{{ $project->slug }}</small></td>
                            <td>
                                @foreach(array_slice($project->technologies_array, 0, 3) as $tech)
                                <span class="badge badge-light border">{{ trim($tech) }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($project->featured)
                                <span class="badge badge-warning"><i class="fas fa-star"></i> Yes</span>
                                @else
                                <span class="badge badge-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $project->order }}</td>
                            <td>{{ $project->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('project.show', $project->slug) }}"
                                    target="_blank"
                                    class="btn btn-sm btn-info"
                                    title="View on site">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                    method="POST"
                                    style="display:inline"
                                    onsubmit="return confirm('Delete this project?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
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