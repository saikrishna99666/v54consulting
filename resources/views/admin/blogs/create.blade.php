@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content_header')
    <h1>Create New Blog</h1>
@stop

@section('content')
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.blogs.form')
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#description").length > 0) {
            CKEDITOR.replace('description', { height: 300 });
        }
    });
</script>
@stop
