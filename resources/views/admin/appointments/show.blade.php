@extends('adminlte::page')

@section('title', 'Appointment Details')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Appointment Details</h1>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back to Appointments List
        </a>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-outline card-primary shadow-sm mb-4">
                <div class="card-header border-bottom-0 pb-0">
                    <h3 class="card-title font-weight-bold">
                        <i class="far fa-calendar-check mr-2 text-primary"></i> Booking Details
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Student Name</label>
                            <span class="h5 font-weight-bold d-block text-dark">{{ $appointment->name }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Current Booking Status</label>
                            @if($appointment->status === 'approved')
                                <span class="badge badge-success px-3 py-2 text-uppercase" style="font-size: 12px; border-radius: 50px;">
                                    <i class="fas fa-check-circle mr-1"></i> Approved
                                </span>
                            @elseif($appointment->status === 'cancelled')
                                <span class="badge badge-danger px-3 py-2 text-uppercase" style="font-size: 12px; border-radius: 50px;">
                                    <i class="fas fa-times-circle mr-1"></i> Cancelled
                                </span>
                            @else
                                <span class="badge badge-warning px-3 py-2 text-uppercase animate-pulse" style="font-size: 12px; border-radius: 50px; color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba;">
                                    <i class="fas fa-hourglass-half mr-1"></i> Pending Review
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Email Address</label>
                            <span class="d-block font-weight-500">
                                <i class="fas fa-envelope text-muted mr-2"></i>
                                <a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Phone Number</label>
                            <span class="d-block font-weight-500">
                                <i class="fas fa-phone-alt text-muted mr-2"></i>
                                <a href="tel:{{ $appointment->phone }}">{{ $appointment->phone }}</a>
                            </span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Requested Service</label>
                            <span class="badge badge-light border border-secondary-subtle px-3 py-2 font-weight-bold" style="font-size: 13px;">
                                <i class="fas fa-graduation-cap text-primary mr-2"></i>
                                {{ $appointment->service ? $appointment->service->ServicesTitle : 'General Consultation' }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted d-block font-weight-normal mb-1">Appointment Slot</label>
                            <div class="d-flex align-items-center">
                                <div class="bg-light border rounded px-3 py-2 mr-3 text-center" style="min-width: 100px;">
                                    <span class="text-xs text-uppercase text-muted d-block">Scheduled Date</span>
                                    <span class="font-weight-bold text-lg text-danger">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</span>
                                </div>
                                <div class="bg-light border rounded px-3 py-2 text-center" style="min-width: 100px;">
                                    <span class="text-xs text-uppercase text-muted d-block">Scheduled Time</span>
                                    <span class="font-weight-bold text-lg text-info">{{ $appointment->appointment_time }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($appointment->message)
                        <div class="bg-light border rounded p-3 mb-3">
                            <label class="text-muted font-weight-bold d-block text-xs text-uppercase mb-2">Student's Message</label>
                            <p class="mb-0 text-secondary" style="font-size: 15px; white-space: pre-wrap;">{{ $appointment->message }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-outline card-secondary shadow-sm mb-4">
                <div class="card-header border-bottom-0 pb-0">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-edit mr-2 text-secondary"></i> Actions
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.appointments.updateStatus', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-4">
                            <label for="status" class="font-weight-bold text-secondary">Change Booking Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $appointment->status === 'approved' ? 'selected' : '' }}>Approve Booking</option>
                                <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancel Booking</option>
                            </select>
                            <small class="text-muted d-block mt-2">Updating the status helps you track confirmed appointments.</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sync-alt mr-2"></i> Update Appointment Status
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="bg-light rounded p-3 border">
                        <span class="font-weight-bold text-xs text-uppercase text-muted d-block mb-2">System Metadata</span>
                        <div class="d-flex justify-content-between text-sm mb-1 text-secondary">
                            <span>Requested On:</span>
                            <span class="font-weight-bold">{{ $appointment->created_at?->format('d M Y, h:i A') ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between text-sm text-secondary">
                            <span>Last Updated:</span>
                            <span class="font-weight-bold">{{ $appointment->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('WARNING: Are you absolutely sure you want to permanently delete this appointment request? This action is irreversible.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash-alt mr-2"></i> Delete Request Permanently
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .font-weight-500 {
        font-weight: 500;
    }
</style>
@stop
