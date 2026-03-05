@extends('layouts.admin')
@section('title', 'Manage Skills')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Skills</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Skills</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0"><i class="fas fa-tools mr-2"></i>All Skills</h3>
                <a href="{{ route('admin.skills.create') }}" class="btn btn-primary btn-sm" id="addSkillBtn">
                    <i class="fas fa-plus"></i> Add Skill
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover datatable" id="skillsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Skill Name</th>
                            <th>Category</th>
                            <th>Level</th>
                            <th>Icon Class</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td>
                                @if($skill->icon)
                                <i class="{{ $skill->icon }} mr-2 text-primary"></i>
                                @endif
                                <strong>{{ $skill->name }}</strong>
                            </td>
                            <td><span class="badge badge-info">{{ $skill->category }}</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1" style="height:8px;width:120px">
                                        <div class="progress-bar bg-primary" style="width:{{ $skill->level }}%"></div>
                                    </div>
                                    <span class="ml-2">{{ $skill->level }}%</span>
                                </div>
                            </td>
                            <td><code style="font-size:.8rem">{{ $skill->icon ?: '—' }}</code></td>
                            <td>{{ $skill->order }}</td>
                            <td>
                                <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill->id) }}"
                                    method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this skill?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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