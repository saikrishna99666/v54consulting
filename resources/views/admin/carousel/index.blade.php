@extends('adminlte::page')

@section('title', 'Carousel Settings')

@section('content_header')
    <h1>Carousel</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Homepage Slides</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.carousel.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search slides..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Slide
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carousels as $slide)
                                <tr>
                                    <td>{{ $loop->iteration + ($carousels->currentPage() - 1) * $carousels->perPage() }}</td>
                                    <td><strong>{{ $slide->title }}</strong></td>
                                    <td>
                                        @if($slide->image_url)
                                            <img src="{{ asset('uploads/carousel/' . $slide->image_url) }}" alt="{{ $slide->title }}" class="img-thumbnail" style="height: 50px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.carousel.edit', $slide->id) }}" class="btn btn-info btn-sm" title="Edit Slide">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.carousel.destroy', $slide->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this slide?')" title="Delete Slide">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center p-4">No carousel slides found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $carousels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
