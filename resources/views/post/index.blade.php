@extends('layouts.admin')

@section('title', 'Post Management')
@include('post.create')
@include('post.edit')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Posts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Post</li>
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
                        <h3 class="card-title">All Posts</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createPostModal">
                                <i class="fas fa-plus"></i> Add New Post
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table id="blogs-table" class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>State</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $posts)
                                <tr>
                                    <td>{{ $posts->id }}</td>
                                    <td>{{ $posts->title }}</td>
                                    <td>{{ $posts->description }}</td>
                                    <td>{{ $posts->state()}}</td>
                                    <td>{{ $posts->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm editbtn"
                                            data-id="{{ $posts->id }}"
                                            data-title="{{ $posts->title }}"
                                            data-description="{{ $posts->description }}"
                                            data-state="{{ $posts->state_id }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </button>
                                        <form action="{{ route('post.destroy', $posts->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
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

@push('scripts')
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).on('click', '.editbtn', function() {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let description = $(this).data('description');
        let state = $(this).data('state');

        $('#edit_post_id').val(id);
        $('#edit_title').val(title);
        $('#edit_description').val(description);
        $('#edit_state_id').val(state);

        $('#editPostForm').attr('action', '/post/' + id);

        $('#editPostModal').modal('show');
    });
</script>

@endpush