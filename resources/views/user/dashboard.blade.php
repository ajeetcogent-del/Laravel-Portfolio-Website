@extends('layouts.admin')

@section('title', 'User Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
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
                        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        You are logged in as a standard user.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection