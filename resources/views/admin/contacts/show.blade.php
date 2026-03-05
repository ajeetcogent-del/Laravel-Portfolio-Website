@extends('layouts.admin')
@section('title', 'View Message – ' . $contact->name)

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Message</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Messages</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-outline card-info">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-envelope-open mr-2"></i>
                            Message from {{ $contact->name }}
                        </h3>
                        <span class="badge badge-success">Read</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width:140px">From</th>
                                <td><strong>{{ $contact->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            </tr>
                            @if($contact->phone)
                            <tr>
                                <th>Phone</th>
                                <td>
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                    &nbsp;
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $contact->phone) }}"
                                        target="_blank" class="text-success ml-2">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @if($contact->subject)
                            <tr>
                                <th>Subject</th>
                                <td>{{ $contact->subject }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Received</th>
                                <td>{{ $contact->created_at->format('d M Y, h:i A') }} ({{ $contact->created_at->diffForHumans() }})</td>
                            </tr>
                        </table>

                        <hr>

                        <div class="p-3" style="background:#f8f9fa;border-radius:8px;border-left:4px solid #17a2b8">
                            <h6 class="text-muted mb-2"><i class="fas fa-comment-dots mr-1"></i>Message</h6>
                            <p style="white-space:pre-wrap;margin:0">{{ $contact->message }}</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex gap-2">
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                            class="btn btn-primary">
                            <i class="fas fa-reply"></i> Reply via Email
                        </a>
                        @if($contact->phone)
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $contact->phone) }}"
                            target="_blank" class="btn btn-success ml-2">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        @endif
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary ml-auto">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                            method="POST" style="display:inline"
                            onsubmit="return confirm('Delete this message permanently?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger ml-2"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection