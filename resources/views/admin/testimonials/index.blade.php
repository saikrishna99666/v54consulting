@extends('adminlte::page')

@section('title', 'Manage Student Testimonials')

@section('content_header')
    <h1>Student Testimonials</h1>
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

            <div class="card shadow-sm">
                <div class="card-header border-0 bg-white py-3">
                    <h3 class="card-title font-weight-bold text-dark"><i class="fas fa-comments mr-2"></i> All Testimonials</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.testimonials.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 280px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search testimonials..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="fas fa-plus mr-1"></i> Add Testimonial
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 80px">Avatar</th>
                                <th>Name</th>
                                <th>Visa Destination</th>
                                <th>Rating</th>
                                <th>Quote Preview</th>
                                <th>Status</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $loop->iteration + ($testimonials->currentPage() - 1) * $testimonials->perPage() }}</td>
                                    <td>
                                        <div class="avatar-wrapper rounded-circle overflow-hidden border" style="width: 50px; height: 50px; background-color: #f1f5f9;">
                                            @if($testimonial->image)
                                                <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-100 h-100" style="object-fit: cover;">
                                            @else
                                                <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="Placeholder" class="w-100 h-100" style="object-fit: cover;">
                                            @endif
                                        </div>
                                    </td>
                                    <td><strong>{{ $testimonial->name }}</strong></td>
                                    <td>{{ $testimonial->destination }}</td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->stars)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted text-sm d-inline-block text-truncate" style="max-width: 300px;">
                                            "{{ $testimonial->quote }}"
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $testimonial->status == 1 ? 'success' : 'danger' }} rounded-pill px-2 py-1">
                                            {{ $testimonial->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-info btn-sm mr-2 rounded-circle" title="Edit Testimonial">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-circle" title="Delete Testimonial">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center p-5 text-muted">No testimonials found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix bg-white border-0 py-3">
                    <div class="float-right">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
