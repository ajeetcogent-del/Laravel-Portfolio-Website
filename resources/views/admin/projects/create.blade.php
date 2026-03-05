@extends('layouts.admin')
@section('title', 'Add Project')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Project Details</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Project Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" placeholder="e.g. School Management System" required>
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Short overview of the project..."
                                    required>{{ old('description') }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Problem Statement</label>
                                <textarea name="problem" rows="3"
                                    class="form-control"
                                    placeholder="What problem does this project solve?">{{ old('problem') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Solution</label>
                                <textarea name="solution" rows="3"
                                    class="form-control"
                                    placeholder="How did you solve it?">{{ old('solution') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Key Features <small class="text-muted">(one per line)</small></label>
                                <textarea name="features" rows="5"
                                    class="form-control"
                                    placeholder="Authentication system&#10;Admin dashboard&#10;REST APIs&#10;Email notifications">{{ old('features') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Results / Impact <small class="text-muted">(one per line)</small></label>
                                <textarea name="results" rows="4"
                                    class="form-control"
                                    placeholder="Improved system efficiency by 40%&#10;Reduced query time by 60%">{{ old('results') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-outline card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Media & Links</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Cover Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                                            id="projectImage" accept="image/*">
                                        <label class="custom-file-label" for="projectImage">Choose file</label>
                                    </div>
                                </div>
                                <small class="text-muted">Max 2MB. JPG, PNG, WebP.</small>
                                @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
                                <div id="imagePreview" class="mt-2" style="display:none">
                                    <img id="previewImg" src="" style="max-width:100%;border-radius:6px;border:1px solid #dee2e6">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Technologies <small class="text-muted">(comma-separated)</small></label>
                                <input type="text" name="technologies"
                                    class="form-control"
                                    value="{{ old('technologies') }}"
                                    placeholder="Laravel, MySQL, REST API, JS">
                            </div>

                            <div class="form-group">
                                <label>GitHub Link</label>
                                <input type="url" name="github_link"
                                    class="form-control"
                                    value="{{ old('github_link') }}"
                                    placeholder="https://github.com/...">
                            </div>

                            <div class="form-group">
                                <label>Live Demo Link</label>
                                <input type="url" name="demo_link"
                                    class="form-control"
                                    value="{{ old('demo_link') }}"
                                    placeholder="https://...">
                            </div>

                            <div class="form-group">
                                <label>Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', 0) }}" min="0">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"
                                        id="featured" name="featured"
                                        {{ old('featured') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="featured">
                                        <i class="fas fa-star text-warning"></i> Featured Project
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary btn-block" id="saveProjectBtn">
                                <i class="fas fa-save"></i> Save Project
                            </button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-block">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Image preview
    document.getElementById('projectImage').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
            document.querySelector('.custom-file-label').textContent = file.name;
        }
    });
</script>
@endpush