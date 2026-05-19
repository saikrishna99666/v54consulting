@extends('adminlte::page')

@section('title', 'Site Settings')

@section('content_header')
    <h1>Site Settings</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dynamic Configuration</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Setting Name</th>
                                <th>Value Preview</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings as $setting)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $setting->header_title ?? 'Config Item #' . $setting->id }}</td>
                                    <td>{{ Str::limit($setting->email ?? $setting->phone_number, 50) }}</td>
                                    <td>
                                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No settings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
