@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Services List</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.services.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search services..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Service
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr id="service-row-{{ $service->Serviceid }}">
                                    <td>{{ $loop->iteration + ($services->currentPage() - 1) * $services->perPage() }}</td>
                                    <td><strong>{{ $service->ServicesTitle }}</strong></td>
                                    <td>{{ $service->pagecategory }}</td>
                                    <td>
                                        {{-- Toggle Switch --}}
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox"
                                                class="custom-control-input status-toggle"
                                                id="toggle-{{ $service->Serviceid }}"
                                                data-id="{{ $service->Serviceid }}"
                                                data-url="{{ route('admin.services.toggleStatus', $service->Serviceid) }}"
                                                {{ $service->status == 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="toggle-{{ $service->Serviceid }}">
                                                <span id="label-{{ $service->Serviceid }}" class="{{ $service->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $service->status == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.services.edit', $service->Serviceid) }}" class="btn btn-info btn-sm mr-2" title="Edit Service">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.services.destroy', $service->Serviceid) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Service">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No services found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $services->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('.status-toggle').on('change', function() {
        var toggle = $(this);
        var id = toggle.data('id');
        var url = toggle.data('url');
        var label = $('#label-' + id);

        // Disable the toggle while request is in progress
        toggle.prop('disabled', true);

        $.ajax({
            url: url,
            type: 'PATCH',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.status == 1) {
                    label.text('Active').removeClass('text-danger').addClass('text-success');
                } else {
                    label.text('Inactive').removeClass('text-success').addClass('text-danger');
                }
                // Show brief success toast
                toastr.success(response.message);
            },
            error: function() {
                // Revert toggle on error
                toggle.prop('checked', !toggle.prop('checked'));
                toastr.error('Could not update status. Please try again.');
            },
            complete: function() {
                toggle.prop('disabled', false);
            }
        });
    });
});
</script>
@stop

