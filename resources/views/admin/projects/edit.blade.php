@extends('layouts.admin')
@section('title', 'Edit Project')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Project Details</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Project Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $project->title) }}" required>
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                    required>{{ old('description', $project->description) }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Problem Statement</label>
                                <textarea name="problem" rows="3" class="form-control">{{ old('problem', $project->problem) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Solution</label>
                                <textarea name="solution" rows="3" class="form-control">{{ old('solution', $project->solution) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Key Features <small class="text-muted">(one per line)</small></label>
                                <textarea name="features" rows="5" class="form-control"
                                    placeholder="Authentication system&#10;Admin dashboard&#10;REST APIs">{{ old('features', is_array($project->features) ? implode("\n", $project->features) : '') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Results / Impact <small class="text-muted">(one per line)</small></label>
                                <textarea name="results" rows="4" class="form-control"
                                    placeholder="Improved efficiency by 40%">{{ old('results', is_array($project->results) ? implode("\n", $project->results) : '') }}</textarea>
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
                                @if($project->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$project->image) }}"
                                        id="previewImg"
                                        style="max-width:100%;border-radius:6px;border:1px solid #dee2e6">
                                    <small class="text-muted d-block mt-1">Current image. Upload new to replace.</small>
                                </div>
                                @else
                                <div id="imagePreview" style="display:none;margin-bottom:8px">
                                    <img id="previewImg" src="" style="max-width:100%;border-radius:6px;border:1px solid #dee2e6">
                                </div>
                                @endif
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="projectImage" accept="image/*">
                                        <label class="custom-file-label" for="projectImage">Choose new image</label>
                                    </div>
                                </div>
                                <small class="text-muted">Max 2MB. JPG, PNG, WebP.</small>
                            </div>

                            <div class="form-group">
                                <label>Technologies</label>
                                <input type="text" name="technologies" class="form-control"
                                    value="{{ old('technologies', $project->technologies) }}"
                                    placeholder="Laravel, MySQL, REST API">
                            </div>

                            <div class="form-group">
                                <label>GitHub Link</label>
                                <input type="url" name="github_link" class="form-control"
                                    value="{{ old('github_link', $project->github_link) }}">
                            </div>

                            <div class="form-group">
                                <label>Live Demo Link</label>
                                <input type="url" name="demo_link" class="form-control"
                                    value="{{ old('demo_link', $project->demo_link) }}">
                            </div>

                            <div class="form-group">
                                <label>Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $project->order) }}" min="0">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="featured" name="featured"
                                        {{ $project->featured ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="featured">
                                        <i class="fas fa-star text-warning"></i> Featured Project
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('project.show', $project->slug) }}" target="_blank" class="btn btn-info btn-block mb-2">
                                <i class="fas fa-eye"></i> View on Site
                            </a>
                            <button type="submit" class="btn btn-warning btn-block">
                                <i class="fas fa-save"></i> Update Project
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
    document.getElementById('projectImage').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                const preview = document.getElementById('previewImg') || document.createElement('img');
                preview.src = e.target.result;
                preview.id = 'previewImg';
                preview.style.cssText = 'max-width:100%;border-radius:6px;border:1px solid #dee2e6;margin-bottom:8px';
                if (!document.getElementById('previewImg')) {
                    this.closest('.custom-file').insertAdjacentElement('beforebegin', preview);
                }
            };
            reader.readAsDataURL(file);
            document.querySelector('.custom-file-label').textContent = file.name;
        }
    });
</script>
@endpush