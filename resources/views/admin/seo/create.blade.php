@extends('adminlte::page')

@section('title', 'Create SEO Setting')

@section('content_header')
    <h1>Create SEO Setting</h1>
@stop

@section('content')
    <form action="{{ route('admin.seo-settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.seo.form')
    </form>
@stop
