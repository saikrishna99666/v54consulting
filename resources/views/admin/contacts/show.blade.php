@extends('adminlte::page')

@section('title', 'View Message')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="m-0">
            <i class="fas fa-envelope-open-text mr-2 text-primary"></i>
            Message Details
        </h1>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back to Messages
        </a>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            {{-- Main Message Card --}}
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-circle mr-2"></i>
                        {{ $contact->Firstname }} {{ $contact->Lastname }}
                    </h3>
                    <div class="card-tools">
                        <span class="badge badge-primary badge-pill px-3 py-2" style="font-size: 12px;">
                            {{ $contact->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </span>
                    </div>
                </div>
                <div class="card-body">

                    {{-- Contact Meta --}}
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-box bg-light shadow-none border">
                                <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text text-muted" style="font-size:11px;">EMAIL ADDRESS</span>
                                    <span class="info-box-number" style="font-size:14px; font-weight:600;">
                                        <a href="mailto:{{ $contact->EmailAddress }}">{{ $contact->EmailAddress ?? '—' }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-light shadow-none border">
                                <span class="info-box-icon bg-success"><i class="fas fa-phone"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text text-muted" style="font-size:11px;">PHONE NUMBER</span>
                                    <span class="info-box-number" style="font-size:14px; font-weight:600;">
                                        {{ $contact->Phoneno ?? '—' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Full Message --}}
                    <div class="form-group">
                        <label class="font-weight-bold text-muted" style="font-size:12px; text-transform:uppercase; letter-spacing:.5px;">
                            <i class="fas fa-comment-dots mr-1"></i> Message
                        </label>
                        <div class="p-3 bg-light rounded border" style="line-height: 1.8; font-size: 15px; white-space: pre-wrap;">{{ $contact->Message ?? '—' }}</div>
                    </div>

                </div>
            </div>

            {{-- Delete Button --}}
            <form action="{{ route('admin.contacts.destroy', $contact->contactid) }}" method="POST" class="mb-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to permanently delete this message?')">
                    <i class="fas fa-trash mr-1"></i> Delete This Message
                </button>
            </form>
        </div>

        <div class="col-lg-4">
            {{-- Resume Card --}}
            <div class="card card-outline card-success shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-alt mr-2"></i>Attached Resume</h3>
                </div>
                <div class="card-body text-center">
                    @if($contact->resume)
                        <div class="py-3">
                            <i class="fas fa-file-pdf fa-4x text-danger mb-3 d-block"></i>
                            <p class="text-muted mb-3" style="font-size:13px; word-break:break-all;">
                                {{ $contact->resume }}
                            </p>
                            <a href="{{ asset('uploads/resumes/' . $contact->resume) }}"
                               target="_blank"
                               class="btn btn-success btn-block">
                                <i class="fas fa-download mr-2"></i> Download Resume
                            </a>
                        </div>
                    @else
                        <div class="py-4 text-center">
                            <i class="fas fa-file-times fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">No resume was attached to this submission.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Quick Info Card --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Additional Info</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td class="text-muted font-weight-bold" style="width:45%; font-size:12px;">Location</td>
                                <td style="font-size:13px;">{{ $contact->Location ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted font-weight-bold" style="font-size:12px;">Qualification</td>
                                <td style="font-size:13px;">{{ $contact->Qualification ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted font-weight-bold" style="font-size:12px;">Visa Status</td>
                                <td style="font-size:13px;">{{ $contact->visastatus ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted font-weight-bold" style="font-size:12px;">Country</td>
                                <td style="font-size:13px;">{{ $contact->country ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted font-weight-bold" style="font-size:12px;">WhatsApp</td>
                                <td style="font-size:13px;">{{ $contact->whatsapp ?? '—' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
