@extends('layouts.admin')
@section('title', 'Add Testimonial')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Testimonial</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
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
                        <h3 class="card-title">Testimonial Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.testimonials.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Rajesh Kumar" required>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" class="form-control"
                                            value="{{ old('company') }}" placeholder="TechStartup Pvt Ltd">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Role / Designation</label>
                                        <input type="text" name="role" class="form-control"
                                            value="{{ old('role') }}" placeholder="CEO / Product Manager">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rating</label>
                                        <select name="rating" class="form-control">
                                            @for($i=5; $i>=1; $i--)
                                            <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>
                                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                            </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Testimonial Message <span class="text-danger">*</span></label>
                                <textarea name="message" rows="5"
                                    class="form-control @error('message') is-invalid @enderror"
                                    placeholder="What did the client say about your work?"
                                    required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
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

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary mr-2" id="saveTestimonialBtn">
                                    <i class="fas fa-save"></i> Save Testimonial
                                </button>
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection