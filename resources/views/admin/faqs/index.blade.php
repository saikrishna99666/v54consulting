@extends('adminlte::page')

@section('title', 'FAQs')

@section('content_header')
    <h1>FAQs</h1>
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
                    <h3 class="card-title">Frequently Asked Questions</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.faqs.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search FAQs..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New FAQ
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Question</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Answer</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration + ($faqs->currentPage() - 1) * $faqs->perPage() }}</td>
                                    <td><strong>{{ $faq->question }}</strong></td>
                                    <td>{{ $faq->category->name ?? 'None' }}</td>
                                    <td>{{ $faq->subcategory->name ?? 'None' }}</td>
                                    <td>{{ Str::limit($faq->answer, 50) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-info btn-sm mr-2" title="Edit FAQ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete FAQ">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $faqs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
