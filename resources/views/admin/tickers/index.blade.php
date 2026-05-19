@extends('adminlte::page')

@section('title', 'Tickers')

@section('content_header')
    <h1>News Tickers</h1>
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
                    <h3 class="card-title">All Tickers</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.tickers.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search tickers..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.tickers.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Ticker
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>News Ticker Content</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickers as $ticker)
                                <tr>
                                    <td>{{ $loop->iteration + ($tickers->currentPage() - 1) * $tickers->perPage() }}</td>
                                    <td><strong>{{ $ticker->title }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.tickers.edit', $ticker->id) }}" class="btn btn-info btn-sm mr-2" title="Edit Ticker">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.tickers.destroy', $ticker->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this ticker?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Ticker">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center p-4">No tickers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $tickers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
