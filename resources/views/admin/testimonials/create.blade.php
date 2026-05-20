@extends('adminlte::page')

@section('title', 'Add Student Testimonial')

@section('content_header')
    <h1>Add Student Testimonial</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.testimonials.form')
            </form>
        </div>
    </div>
</div>
@stop
