@extends('adminlte::page')

@section('title', isset($achievement) ? 'Edit Achievement' : 'Create Achievement')

@section('content_header')
    <h1>{{ isset($achievement) ? 'Edit Achievement' : 'Create Achievement' }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($achievement) ? route('admin.achievements.update', $achievement->id) : route('admin.achievements.store') }}" method="POST">
                @csrf
                @if(isset($achievement))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Count Number (e.g., 50, 95, 1)</label>
                        <input type="text" name="count_number" class="form-control" value="{{ old('count_number', $achievement->count_number ?? '') }}" required>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Suffix (k+, %, +, etc.)</label>
                        <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $achievement->suffix ?? '') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Title (e.g., Visa Success Rate)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $achievement->title ?? '') }}" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $achievement->description ?? '') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Achievement</button>
                <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
@stop
