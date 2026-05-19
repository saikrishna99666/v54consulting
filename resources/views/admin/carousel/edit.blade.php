@extends('adminlte::page')

@section('title', 'Edit Slide')

@section('content_header')
    <h1>Edit Slide</h1>
@stop

@section('content')
    <form action="{{ route('admin.carousel.update', $carousel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.carousel.form')
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#description").length > 0) {
            CKEDITOR.replace('description', { height: 200 });
        }
    });
</script>
@stop
