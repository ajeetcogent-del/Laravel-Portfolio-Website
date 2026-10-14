@extends('layouts.admin')
@section('title', 'Add Skill')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Skill</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">Skills</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Skill Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.skills.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Skill Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="e.g. Laravel" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                    <option value="">— Select Category —</option>
                                    @foreach(['Backend', 'Database', 'Tools', 'Frontend Basics'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Proficiency Level: <strong id="levelDisplay">{{ old('level', 85) }}%</strong></label>
                                <input type="range" name="level" class="form-control-range"
                                    id="levelRange" min="0" max="100" step="5"
                                    value="{{ old('level', 85) }}"
                                    oninput="document.getElementById('levelDisplay').textContent = this.value + '%'">
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">0% Beginner</small>
                                    <small class="text-muted">100% Expert</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Font Awesome Icon Class <small class="text-muted">(optional)</small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i id="iconPreview" class="fas fa-code"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="icon" class="form-control"
                                        value="{{ old('icon') }}"
                                        id="iconInput"
                                        placeholder="fab fa-laravel"
                                        oninput="document.getElementById('iconPreview').className = this.value || 'fas fa-code'">
                                </div>
                                <small class="text-muted">
                                    E.g. <code>fab fa-laravel</code>, <code>fas fa-database</code>, <code>fab fa-php</code>
                                </small>
                            </div>

                            <div class="form-group">
                                <label>Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', 0) }}" min="0">
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary mr-2" id="saveSkillBtn">
                                    <i class="fas fa-save"></i> Save Skill
                                </button>
                                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Quick reference --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Common Icon Classes</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach([
                            ['fab fa-laravel','Laravel'], ['fab fa-php','PHP'], ['fab fa-js','JavaScript'],
                            ['fas fa-database','MySQL'], ['fab fa-git-alt','Git'], ['fab fa-node-js','Node.js'],
                            ['fab fa-docker','Docker'], ['fas fa-server','Server'], ['fas fa-code','Code'],
                            ['fab fa-github','GitHub'], ['fas fa-cog','Tools'], ['fab fa-css3','CSS'],
                            ] as [$ico, $lbl])
                            <button type="button" class="btn btn-sm btn-light border mb-1"
                                onclick="document.querySelector('[name=icon]').value='{{ $ico }}'; document.getElementById('iconPreview').className='{{ $ico }}'">
                                <i class="{{ $ico }} mr-1"></i> {{ $lbl }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection