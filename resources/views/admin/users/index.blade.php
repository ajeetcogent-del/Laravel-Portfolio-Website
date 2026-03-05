@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    @include('admin.users.create')
    @include('admin.users.edit')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ session('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUserModal">
                                <i class="fas fa-plus"></i> Add New User
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table id="users-table" class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? '-' }}</td>
                                    <td><span class="badge bg-{{ $user->getRoleBadge() }}">{{ $user->getRoleLabel() }}</span></td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm edit-user-btn" data-id="{{ $user->id }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Handle Add User Form Submission
        $('#addUserForm').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.users.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#addUserModal').modal('hide');
                        location.reload();
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(key => {
                        toastr.error(errors[key][0]);
                    });
                }
            });
        });

        // Handle Edit Button Click
        $(document).on('click', '.edit-user-btn', function() {
            let userId = $(this).data('id');
            let url = "{{ route('admin.users.edit', ':id') }}".replace(':id', userId);

            $.get(url, function(data) {
                $('#edit_user_id').val(data.user.id);
                $('#edit_name').val(data.user.name);
                $('#edit_email').val(data.user.email);
                $('#edit_phone').val(data.user.phone);
                $('#edit_role').val(data.user.role);
                $('#edit_password').val('');
                $('#edit_password_confirmation').val('');
                $('#editUserModal').modal('show');
            });
        });

        // Handle Edit User Form Submission
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();
            let userId = $('#edit_user_id').val();
            let url = "{{ route('admin.users.update', ':id') }}".replace(':id', userId);
            let formData = $(this).serialize();

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#editUserModal').modal('hide');
                        location.reload(); // Reload to show updated data
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(key => {
                        toastr.error(errors[key][0]);
                    });
                }
            });
        });
    });
</script>
@endpush