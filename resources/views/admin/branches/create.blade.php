@extends('adminlte::page')

@section('title', 'Add New Branch')

@section('content_header')
    <h1>Add New Branch / Location</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.branches.store') }}" method="POST">
                @csrf
                @include('admin.branches.form')
            </form>
        </div>
    </div>
</div>
@stop
