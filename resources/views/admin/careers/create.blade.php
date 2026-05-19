@extends('adminlte::page')

@section('title', 'Add Job Opening')

@section('content_header')
    <h1>Add Job Opening</h1>
@stop

@section('content')
    <form action="{{ route('admin.careers.store') }}" method="POST">
        @csrf
        @include('admin.careers.form')
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#description").length > 0) {
            CKEDITOR.replace('description', { height: 250 });
        }
        if($("#requirements").length > 0) {
            CKEDITOR.replace('requirements', { height: 200 });
        }
    });
</script>
@stop
