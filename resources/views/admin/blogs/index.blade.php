@extends('layouts.admin')

@section('title', 'Blog Management')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blogs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- Success Message --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ session('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Blogs</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Blog
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table id="blogs-table" class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->category }}</td>
                                    <td>
                                        @foreach ($blog->tags ?? [] as $tag)
                                        <span class="badge badge-info">{{ $tag }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $blog->image) }}"
                                            alt="{{ $blog->title }}"
                                            class="img-fluid" style="max-width:100px;">
                                    </td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
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
        </div>
    </div>
</section>
@endsection