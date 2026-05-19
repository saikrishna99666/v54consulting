@extends('adminlte::page')

@section('title', 'Add Team Member')

@section('content_header')
    <h1>Add Team Member</h1>
@stop

@section('content')
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.team.form')
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        if($("#short_description").length > 0) {
            CKEDITOR.replace('short_description', { height: 200 });
        }
    });
</script>
@stop
