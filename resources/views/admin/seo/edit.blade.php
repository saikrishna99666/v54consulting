@extends('adminlte::page')

@section('title', 'Edit SEO Setting')

@section('content_header')
    <h1>Edit SEO Setting</h1>
@stop

@section('content')
    <form action="{{ route('admin.seo-settings.update', $seo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.seo.form')
    </form>
@stop
