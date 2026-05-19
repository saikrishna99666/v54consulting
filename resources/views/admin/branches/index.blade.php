@extends('adminlte::page')

@section('title', 'Manage Branches')

@section('content_header')
    <h1>Office Locations & Branches</h1>
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
                    <h3 class="card-title">Manage Office Branches & Locations</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.branches.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search Branches..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.branches.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Location
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($branches as $branch)
                                <tr>
                                    <td>{{ $loop->iteration + ($branches->currentPage() - 1) * $branches->perPage() }}</td>
                                    <td><strong>{{ $branch->name }}</strong></td>
                                    <td>{{ Str::limit($branch->address, 60) }}</td>
                                    <td>{{ $branch->phone }}</td>
                                    <td>{{ $branch->email ?: '-' }}</td>
                                    <td>
                                        @if($branch->is_head_office)
                                            <span class="badge badge-success"><i class="fas fa-star mr-1"></i> Head Office</span>
                                        @else
                                            <span class="badge badge-info">Counselling Branch</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-info btn-sm" title="Edit Location">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this branch location?')" title="Delete Location">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center p-4">No branch locations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $branches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
