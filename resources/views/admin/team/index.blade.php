@extends('adminlte::page')

@section('title', 'Team Members')

@section('content_header')
    <h1>Team members</h1>
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
                    <h3 class="card-title">All Team Members</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.team.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search team..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.team.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Team Member
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Name</th>
                                <th>Qualification</th>
                                <th>Status</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teams as $member)
                                <tr>
                                    <td>{{ $loop->iteration + ($teams->currentPage() - 1) * $teams->perPage() }}</td>
                                    <td><strong>{{ $member->name }}</strong></td>
                                    <td>{{ $member->qualification }}</td>
                                    <td>
                                        <span class="badge badge-{{ $member->status == 1 ? 'success' : 'danger' }}">
                                            {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-info btn-sm mr-2" title="Edit Team Member">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Team Member">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center p-4">No team members found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $teams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
