@extends('adminlte::page')

@section('title', 'Service Categories')

@section('content_header')
    <h1>Service Categories</h1>
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
                    <h3 class="card-title">Categories List</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.categories.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search categories..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Category
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Type</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse($categories as $index => $cat)
                                    <tr>
                                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->parent->name ?? 'None' }}</td>
                                        <td>
                                            @if($cat->parent_id)
                                                <span class="badge badge-info">Subcategory</span>
                                            @else
                                                <span class="badge badge-primary">Main Category</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? Deleting a main category will delete all its subcategories.')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{ $categories->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop
