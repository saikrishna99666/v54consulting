@extends('adminlte::page')

@section('title', 'Edit Blog')

@section('content_header')
    <h1>Edit Blog</h1>
@stop

@section('content')
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
