@extends('layouts.admin')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Process</h5>
                        </div>
                        <div class="card-body">
                            <form id="addProcess" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Process</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        $document.validator('#addProcess').validate({
            rules:{
                title:{
                    required:true,
                    minlength:3,
                    maxlength:191,
                },
                description:{
                    required:true,
                    minlength:3,
                    maxlength:191,
                },
                image:{
                    required:true,
                    accept:"image/jpeg,image/png,image/gif",
                    maxfilesize:2097152,
                },
                status:{
                    required:true,
                    string:true,
                    maxlength:100,
                }
            },
            messages:{
                title:{
                    required:"Please enter a title",
                    minlength:"Title must be at least 3 characters long",
                    maxlength:"Title cannot exceed 191 characters",
                },
                description:{
                    required:"Please enter a description",
                    minlength:"Description must be at least 3 characters long",
                    maxlength:"Description cannot exceed 191 characters",
                },
                image:{
                    required:"Please select an image",
                    accept:"Please select a valid image",
                    maxfilesize:"Image must be less than 2MB",
                },
                status:{
                    required:"Please select a status",
                    string:"Please select a valid status",
                    maxlength:"Status cannot exceed 100 characters",
                }
            }
        });
    </script>
@endsection 
@endsection 