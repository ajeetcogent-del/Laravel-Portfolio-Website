@extends('layouts.admin')

@section('title', 'Agent Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Agent Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Welcome {{Auth::user()->name}}</h3>
                    </div>
                    <div class="card-body">
                        <p>You can view users from the sidebar.</p>
                        <p>Edit your profile <a href="#">here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection