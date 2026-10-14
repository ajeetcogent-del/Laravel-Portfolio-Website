@extends('layouts.admin')
@section('title', 'Edit Skill')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Skill</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">Skills</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit: {{ $skill->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                            @csrf @method('PUT')

                            <div class="form-group">
                                <label>Skill Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $skill->name) }}" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-control" required>
                                    @foreach(['Backend', 'Database', 'Tools', 'Frontend Basics'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Proficiency Level: <strong id="levelDisplay">{{ old('level', $skill->level) }}%</strong></label>
                                <input type="range" name="level" class="form-control-range"
                                    min="0" max="100" step="5"
                                    value="{{ old('level', $skill->level) }}"
                                    oninput="document.getElementById('levelDisplay').textContent = this.value + '%'">
                            </div>

                            <div class="form-group">
                                <label>Icon Class</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i id="iconPreview" class="{{ $skill->icon ?: 'fas fa-code' }}"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="icon" class="form-control"
                                        value="{{ old('icon', $skill->icon) }}"
                                        placeholder="fab fa-laravel"
                                        oninput="document.getElementById('iconPreview').className = this.value || 'fas fa-code'">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $skill->order) }}" min="0">
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-warning mr-2">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection