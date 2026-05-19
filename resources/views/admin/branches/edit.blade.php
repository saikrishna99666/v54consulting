@extends('adminlte::page')

@section('title', 'Edit Branch')

@section('content_header')
    <h1>Edit Branch / Location</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.branches.form')
            </form>
        </div>
    </div>
</div>
@stop
