@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contact Messages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
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

        {{-- Stats row --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Messages</span>
                        <span class="info-box-number">{{ $contacts->total() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-envelope-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Unread</span>
                        <span class="info-box-number">{{ $contacts->where('is_read', false)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-check-double"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Read</span>
                        <span class="info-box-number">{{ $contacts->where('is_read', true)->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-inbox mr-2"></i>All Messages</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                <td>{{ $contact->id }}</td>
                                <td>
                                    @if(!$contact->is_read)
                                    <span class="badge badge-warning"><i class="fas fa-circle" style="font-size:.5rem"></i> New</span>
                                    @else
                                    <span class="badge badge-light border">Read</span>
                                    @endif
                                </td>
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                <td>{{ Str::limit($contact->subject, 40) ?: '—' }}</td>
                                <td>{{ $contact->phone ?: '—' }}</td>
                                <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                        method="POST" style="display:inline"
                                        onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-5">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    No contact messages yet.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($contacts->hasPages())
            <div class="card-footer">
                {{ $contacts->links() }}
            </div>
            @endif
        </div>
    </div>
</section>
@endsection