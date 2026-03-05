@extends('layouts.admin')
@section('title', 'Add Service')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Service</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Service Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.services.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Service Title <span class="text-danger">*</span></label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}"
                                    placeholder="e.g. Laravel Web Application Development"
                                    required>
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Describe what this service includes..."
                                    required>{{ old('description') }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Icon Class <small class="text-muted">(Font Awesome)</small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i id="iconPreview" class="fas fa-cog"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="icon" class="form-control"
                                        value="{{ old('icon', 'fas fa-cog') }}"
                                        placeholder="fas fa-code"
                                        oninput="document.getElementById('iconPreview').className = this.value || 'fas fa-cog'">
                                </div>
                                <div class="mt-2 d-flex flex-wrap gap-2">
                                    @foreach([
                                    ['fas fa-layer-group','Web App'], ['fas fa-exchange-alt','Migration'],
                                    ['fas fa-project-diagram','API'], ['fas fa-bug','Debugging'],
                                    ['fas fa-server','Server'], ['fas fa-database','Database'],
                                    ['fas fa-shield-alt','Security'], ['fas fa-mobile-alt','Mobile'],
                                    ] as [$ico, $lbl])
                                    <button type="button" class="btn btn-sm btn-light border"
                                        onclick="document.querySelector('[name=icon]').value='{{ $ico }}'; document.getElementById('iconPreview').className='{{ $ico }}'">
                                        <i class="{{ $ico }} mr-1"></i>{{ $lbl }}
                                    </button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Display Order</label>
                                        <input type="number" name="order" class="form-control"
                                            value="{{ old('order', 0) }}" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pt-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                id="is_active" name="is_active" checked>
                                            <label class="custom-control-label" for="is_active">Show on website</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary mr-2" id="saveServiceBtn">
                                    <i class="fas fa-save"></i> Save Service
                                </button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection