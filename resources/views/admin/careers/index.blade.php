@extends('adminlte::page')

@section('title', 'Career Openings')

@section('content_header')
    <h1>Career Openings</h1>
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
                    <h3 class="card-title">Manage Job Openings</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.careers.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search Careers..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.careers.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Job
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($careers as $career)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $career->title }}</strong></td>
                                    <td>{{ $career->location }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $career->type }}</span>
                                    </td>
                                    <td>
                                        @if($career->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.careers.edit', $career->id) }}" class="btn btn-info btn-sm" title="Edit Opening">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this career opening?')" title="Delete Opening">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4">No job openings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $careers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
