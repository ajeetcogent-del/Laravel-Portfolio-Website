@extends('layouts.admin')

@section('title', 'Add New Blog')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Blog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.blogs.index') }}">Blogs</a>
                    </li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Blog Details</h3>
                    </div>

                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text"
                                            name="title"
                                            id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}"
                                            placeholder="Enter blog title">
                                        @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text"
                                            name="slug"
                                            id="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            value="{{ old('slug') }}"
                                            placeholder="Auto-generated slug">
                                        @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Excerpt</label>
                                <textarea name="excerpt"
                                    class="form-control @error('excerpt') is-invalid @enderror"
                                    rows="2"
                                    placeholder="Short summary">{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content"
                                    id="content"
                                    class="form-control summernote @error('content') is-invalid @enderror"
                                    rows="6">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file"
                                    name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text"
                                            name="category"
                                            class="form-control @error('category') is-invalid @enderror"
                                            value="{{ old('category') }}"
                                            placeholder="Category">
                                        @error('category')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <input type="text"
                                            name="tags"
                                            class="form-control select2 @error('tags') is-invalid @enderror"
                                            value="{{ old('tags') }}"
                                            placeholder="Laravel, PHP, AdminLTE">
                                        @error('tags')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Blog
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(function() {

        // Slug generator
        $('#title').on('keyup', function() {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');
            $('#slug').val(slug);
        });

        // Summernote
        $('.summernote').summernote({
            height: 250
        });

        // Select2
        $('.select2').select2({
            tags: true,
            tokenSeparators: [',']
        });

    });
</script>
@endpush