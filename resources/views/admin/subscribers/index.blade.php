@extends('adminlte::page')

@section('title', 'Subscribers')

@section('content_header')
    <h1>Newsletter Subscribers</h1>
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
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title">All Subscribers</h3>
                    <div class="card-tools ml-auto d-flex">
                        <form action="{{ route('admin.subscribers.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search email..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.subscribers.broadcast') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-bullhorn"></i> Send Announcement
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Email</th>
                                <th>Joined Date</th>
                                <th style="width: 120px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $loop->iteration + ($subscribers->currentPage() - 1) * $subscribers->perPage() }}</td>
                                    <td><strong>{{ $subscriber->email }}</strong></td>
                                    <td>{{ $subscriber->created_at?->format('d M Y') ?? 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this subscriber?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Subscriber">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center p-4">No subscribers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $subscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
