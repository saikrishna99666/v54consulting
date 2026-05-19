@extends('adminlte::page')

@section('title', 'SEO Settings')

@section('content_header')
    <h1>SEO & Sitemap Settings</h1>
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
                    <h3 class="card-title">Manage Global Page SEO & Sitemap Configurations</h3>
                    <div class="card-tools d-flex">
                        <form action="{{ route('admin.seo-settings.index') }}" method="GET" class="mr-3">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search pages..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('admin.seo-settings.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New SEO Page
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Page Name</th>
                                <th>URL Path</th>
                                <th>SEO Title</th>
                                <th style="width: 130px; text-align: center;">In Sitemap?</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($seoSettings as $seo)
                                <tr>
                                    <td>{{ $loop->iteration + ($seoSettings->currentPage() - 1) * $seoSettings->perPage() }}</td>
                                    <td><strong>{{ $seo->page_name }}</strong></td>
                                    <td><code>{{ $seo->url_path }}</code></td>
                                    <td>{{ Str::limit($seo->seo_title, 55) }}</td>
                                    <td class="text-center">
                                        @if($seo->in_sitemap)
                                            <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Yes</span>
                                        @else
                                            <span class="badge badge-danger"><i class="fas fa-times mr-1"></i> No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.seo-settings.edit', $seo->id) }}" class="btn btn-info btn-sm mr-2" title="Edit SEO Settings">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.seo-settings.destroy', $seo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete these SEO settings?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete SEO Settings">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4">No SEO records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $seoSettings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
