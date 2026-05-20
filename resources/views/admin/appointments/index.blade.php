@extends('adminlte::page')

@section('title', 'Manage Appointments')

@section('content_header')
    <h1>Manage Appointments</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header border-0">
                    <h3 class="card-title">List of Appointment Requests</h3>
                    <div class="card-tools d-flex align-items-center" style="gap: 12px;">

                        {{-- Status Filter --}}
                        <form action="{{ route('admin.appointments.index') }}" method="GET" class="d-flex align-items-center" style="gap: 6px;">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <select name="status" class="form-control form-control-sm" style="min-width: 150px;" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>

                        {{-- Search Form --}}
                        <form action="{{ route('admin.appointments.index') }}" method="GET">
                            <input type="hidden" name="status" value="{{ request('status') }}">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search appointments..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-valign-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 60px">#</th>
                                    <th>Student Name</th>
                                    <th>Contact Info</th>
                                    <th>Desired Service</th>
                                    <th>Scheduled Date & Time</th>
                                    <th>Status</th>
                                    <th>Booking Date</th>
                                    <th style="width: 140px" class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $loop->iteration + ($appointments->currentPage() - 1) * $appointments->perPage() }}</td>
                                        <td>
                                            <span class="font-weight-bold d-block">{{ $appointment->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-sm text-muted">
                                                <i class="fas fa-envelope mr-1"></i> <a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
                                            </span>
                                            <span class="d-block text-sm text-muted">
                                                <i class="fas fa-phone-alt mr-1"></i> {{ $appointment->phone }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light border px-2 py-1">
                                                <i class="fas fa-briefcase mr-1 text-primary"></i> {{ $appointment->service ? $appointment->service->ServicesTitle : 'General Consultation' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-block font-weight-500">
                                                <i class="far fa-calendar-alt text-danger mr-1"></i> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                                            </span>
                                            <span class="d-block text-sm text-muted">
                                                <i class="far fa-clock text-info mr-1"></i> {{ $appointment->appointment_time }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($appointment->status === 'approved')
                                                <span class="badge badge-success px-2 py-1 text-uppercase" style="font-size: 11px;">
                                                    <i class="fas fa-check mr-1"></i> Approved
                                                </span>
                                            @elseif($appointment->status === 'cancelled')
                                                <span class="badge badge-danger px-2 py-1 text-uppercase" style="font-size: 11px;">
                                                    <i class="fas fa-times mr-1"></i> Cancelled
                                                </span>
                                            @else
                                                <span class="badge badge-warning px-2 py-1 text-uppercase" style="font-size: 11px; color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba;">
                                                    <i class="fas fa-hourglass-half mr-1"></i> Pending
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-sm text-muted">{{ $appointment->created_at?->format('d M Y, h:i A') ?? 'N/A' }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-info btn-sm mr-1" title="View details & manage">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment request?')" title="Delete request">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5">
                                            <i class="far fa-calendar-times fa-3x text-muted mb-3"></i>
                                            <p class="text-muted mb-0">No appointment requests found matching filters.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .table td, .table th {
        vertical-align: middle !important;
    }
</style>
@stop
